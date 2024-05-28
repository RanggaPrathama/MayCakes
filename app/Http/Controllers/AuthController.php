<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(){
        return view('User.login');
    }

    public function loginPost(Request $request){
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($validatedData)){
            $request->session()->regenerate();
            if(auth()->user()->role == 0){
                return redirect()->route('homeUser')->with('success','Login successful');
            }
            if(auth()->user()->role == 1){
                return redirect()->route('cake.index')->with('success','Login successful');
            }


        }
        else{
            return redirect()->route('login')->with('error','Login failed');
        }

    }

    public function register(){
        return view('user.register');
    }

    public function registerPost(Request $request){
        $validatedData = $request->validate([
            'name' =>'required',
            'email' =>'required',
            'password' => 'required|confirmed',
        ]);

        $users = DB::table('users')->get();
        if(count($users)<1){
            DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>  bcrypt($request->password),
                'role' => 1,
            ]);
        }else{
            DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>  bcrypt($request->password),
                'role' => 0,
            ]);
        }


        return redirect()->route('login')->with('success','Register successful');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

}
