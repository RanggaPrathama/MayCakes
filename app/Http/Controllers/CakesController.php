<?php

namespace App\Http\Controllers;

use App\Models\cakes;
use App\Http\Requests\StorecakesRequest;
use App\Http\Requests\UpdatecakesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CakesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cakes = DB::table('cakes')->get();
        return view('admin.cakes.index',['cakes' => $cakes]);
    }

    public function showImage($id)
    {

        $cake = DB::table('cakes')->where('id_cake', $id)->first();

        if (!$cake) {
            abort(404);
        }

        $path = storage_path('app/' . $cake->gambar_cake);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cakes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_cake' => 'required',
            'deskripsi_cake' => 'required',
            'harga_cake' => 'required',
            'gambar_cake' => 'required|mimes:png,jpg',
            'harga_cake' =>'required',
            'created_at'=> now()
        ],
    );

        if($request->hasFile('gambar_cake')){
            $gambar = $request->file('gambar_cake')->getClientOriginalName();
            $path=$request->file('gambar_cake')->store('private/cakes');
            $validatedData["gambar_cake"] = $path;
        }

        $tesCake = DB::table('cakes')->insert($validatedData);
        if($tesCake){
            return redirect()->route('cake.index')->with('success','Data Cake Successfully Added');
        }else{
            return redirect()->route('cake.index')->with('error','Data Cake Failed Added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(cakes $cakes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cakes = DB::table('cakes')->where('id_cake','=',$id)->first();
        return view('admin.cakes.update',['cakes'=> $cakes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_cake' =>'required',
            'deskripsi_cake' =>'required',
            'harga_cake' =>'required',
            'gambar_cake' =>'required|mimes:png,jpg',
            'harga_cake' =>'required',
            'updated_at' =>now()
        ]);

        $cakes = DB::table('cakes')->where('id_cake','=',$id)->first();
        if($request->hasFile('gambar_cake')){
            if($cakes){
                Storage::delete($cakes->gambar_cake);
            }
            $gambar = $request->file('gambar_cake')->getClientOriginalName();
            $path = $request->file('gambar_cake')->store('private/cakes');
            $validatedData["gambar_cake"] = $path;
        }

        $tesCake = DB::table('cakes')->where('id_cake','=',$id)->update($validatedData);

        if($tesCake){
            return redirect()->route('cake.index')->with('success','Data Cake Successfully Updated');
        }else{
            return redirect()->route('cake.index')->with('error','Data Cake Failed Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cakes = DB::table('cakes')->where('id_cake','=',$id)->first();
        if($cakes){
            Storage::delete($cakes->gambar_cake);
        }
        $deleteData = DB::table('cakes')->where('id_cake',$id)->delete();
        if($deleteData){
            return redirect()->route('cake.index')->with('success','Data Cake Successfully Deleted');
        }else{
            return redirect()->route('cake.index')->with('error','Data Cake Failed Deleted');
        }
    }
}
