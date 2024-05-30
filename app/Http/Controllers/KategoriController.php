<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Http\Requests\StorekategoriRequest;
use App\Http\Requests\UpdatekategoriRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $kategoris = DB::table('kategoris')->get();
        return view('admin.kategori.index',['kategoris' => $kategoris]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required'
        ]);

        $kategoris = DB::table('kategoris')->insert($validatedData);
        if($kategoris){
            return redirect()->route('kategori.index')->with('success','Kategoris Successfully Added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategoris = DB::table('kategoris')->where('id_kategoris','=',$id)->first();
        return view('admin.kategori.update',['kategoris' => $kategoris]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kategoris' => 'required'
        ]);
        $kategoris = DB::table('kategoris')->where('id_kategoris','=',$id)->update($validatedData);
        if($kategoris){
            return redirect()->route('kategori.index')->with('success','Kategoris Successfully Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $kategoris = DB::table('kategoris')->where('id_kategoris','=',$id)->delete();
        if($kategoris){
            return redirect()->route('kategori.index')->with('success','Kategoris Successfully Deleted');
        }

    }
}
