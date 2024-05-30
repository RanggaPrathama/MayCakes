<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function homeUser(){
        $cakes = DB::table('cakes')->get();
        return view('User.homeUser',['cakes'=>$cakes]);
    }

    public function katalogUser(){
        $brownies = DB::table('cakes')
        ->join('kategoris','kategoris.id_kategori','=','cakes.id_kategori')
        ->whereRaw('LOWER(nama_kategori) LIKE LOWER(?)', ['brownies'])
        ->get();

        $cakes = DB::table('cakes')
        ->join('kategoris','kategoris.id_kategori','=','cakes.id_kategori')
        ->whereRaw('LOWER(nama_kategori) LIKE LOWER(?)', ['cake'])
        ->get();

        return view('User.catalog',['brownies'=>$brownies,'cakes'=>$cakes]);
    }

    public function productDetail($id){
        $cakes = DB::table('cakes')->where('id_cake','=',$id)->first();
        return view("User.product",['cakes'=>$cakes]);
    }

    public function cart($id){
        $carts = DB::table('carts')
                ->select('cakes.id_cake','cakes.nama_cake','cakes.harga_cake','cakes.gambar_cake','carts.quantity')
                ->join('cakes','cakes.id_cake','=','carts.id_cake')
                ->where('id_user','=',$id)->get();
        return view('User.cart',['carts'=> $carts]);
    }
}
