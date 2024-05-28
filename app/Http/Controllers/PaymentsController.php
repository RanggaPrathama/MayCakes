<?php

namespace App\Http\Controllers;

use App\Models\payments;
use App\Http\Requests\StorepaymentsRequest;
use App\Http\Requests\UpdatepaymentsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = DB::table('payments')->get();
        return view('admin.payments.index',['payments'=>$payments]);
    }

    public function imagePayment($id){

        $payment = DB::table('payments')->where('id_payment',$id)->first();
        if(!$payment){
            abort(404);
        }

        $gambar = storage_path('app/'.$payment->gambar_payment);
        if (!file_exists($gambar)) {
            abort(404);
        }
        return response()->file($gambar);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.payments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_rekening' => 'required',
            'atas_nama' => 'required',
            'nama_bank' => 'required',
            'gambar_payment' => 'required|mimes:png,jpg',
            'created_at'=> now()
        ]);

        if($request->hasFile('gambar_payment')){
            $gambar = $request->file('gambar_payment')->getClientOriginalName();
            $path = $request->file('gambar_payment')->store('private/payments');
            $validatedData['gambar_payment'] = $path;
        }

        $dataPaymant = DB::table('payments')->insert($validatedData);

        if($dataPaymant){
            return redirect()->route('payment.index')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect()->back()->with('error','Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $payments = DB::table('payments')->where('id_payment','=',$id)->first();
        return view('admin.payments.update',['payments' => $payments]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData  = $request->validate([
            'no_rekening' => 'required',
            'atas_nama' => 'required',
            'nama_bank' => 'required',
            'gambar_payment' => 'required|mimes:png,jpg',
            'updated_at'=> now()
        ]);

        $payments = DB::table('payments')->where('id_payment','=',$id)->first();

        if($request->hasFile('gambar_payment')){
            if($payments){
                Storage::delete($payments->gambar_payment);
            }
            $gambar = $request->file('gambar_payment')->getClientOriginalName();
            $path = $request->file('gambar_payment')->store('private/payments');
            $validatedData['gambar_payment'] = $path;
        }

        $dataPayment = DB::table('payments')->where('id_payment','=',$id)->update($validatedData);

        if($dataPayment){
            return redirect()->route('payment.index')->with('success','Data Berhasil Diubah');
        }else{
            return redirect()->back()->with('error','Data Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $payments = DB::table('payments')->where('id_payment','=',$id)->first();
        if($payments){
            Storage::delete($payments->gambar_payment);
        }
        $dataPayment = DB::table('payments')->where('id_payment','=',$id)->delete();
        if($dataPayment){
            return redirect()->route('payment.index')->with('success','Data Berhasil Dihapus');
        }else{
            return redirect()->back()->with('error','Data Gagal Dihapus');
        }
    }
}
