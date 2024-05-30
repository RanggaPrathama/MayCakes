<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use App\Http\Requests\StorepembayaranRequest;
use App\Http\Requests\UpdatepembayaranRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $pemesanans = DB::table('pemesanans')->where('id_pemesanan','=',$id)->first();
        $payments = DB::table('payments')->first();
        return view('User.pembayaran',['pemesanans' => $pemesanans,'payments'=>$payments]);
    }

    public function laporanTransaksi(){
        $transaksis = DB::table('pembayarans')
                    ->select('pembayarans.created_at', 'pemesanans.total_pesan','users.name')
                    ->join('pemesanans','pemesanans.id_pemesanan','=','pembayarans.id_pemesanan')
                    ->join('users','users.id_user','=','pemesanans.id_user')
                    ->get();
        return view('admin.laporanTransaksi.index',['transaksis' => $transaksis]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_payment' => 'required',
            'id_pemesanan' => 'required',
            'buktiBayar' => 'required',
        ]);

        if($request->hasFile('buktiBayar')){
            $gambar = $request->file('buktiBayar')->getClientOriginalName();

            $path = $request->file('buktiBayar')->store('private/buktibayar');
            $validatedData['buktiBayar'] = $path;
        }

        $pembayaran = DB::table('pembayarans')->insert([
            'id_payment' => $validatedData['id_payment'],
            'id_pemesanan' => $validatedData['id_pemesanan'],
            'buktiBayar' => $validatedData['buktiBayar'],
            'status' => 1,
            'created_at' => now()
        ]);

        if($pembayaran){
            return redirect()->route('homeUser')->with('success', 'Pembayaran Added Success');
        }else{
            return redirect()->back()->with('error', 'Pembayaran Added Failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepembayaranRequest $request, pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pembayaran $pembayaran)
    {
        //
    }
}
