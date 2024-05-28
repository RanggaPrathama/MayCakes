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
}
