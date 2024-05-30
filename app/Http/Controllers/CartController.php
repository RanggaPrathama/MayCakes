<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Http\Requests\StorecartRequest;
use App\Http\Requests\UpdatecartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        try {
            DB::beginTransaction();


            $userId = auth()->user()->id_user;


            $carts = DB::table('carts')->where('id_user', '=', $userId)->where('id_cake', '=', $request->id_cake)->first();

            if ($carts) {

                $updatedCarts = DB::table('carts')->where('id_cart', '=', $carts->id_cart)->update([
                    'quantity' => $carts->quantity + $request->quantity,
                    'updated_at' => now()
                ]);

                if ($updatedCarts) {
                    DB::commit();
                    return redirect()->route('cart',auth()->user()->id_user)->with('success', 'Cart successfully updated');
                } else {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Failed to update the cart');
                }
            } else {
               
                $newCart = DB::table('carts')->insert([
                    'id_cake' => $request->id_cake,
                    'quantity' => $request->quantity,
                    'id_user' => $userId,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                if ($newCart) {
                    DB::commit();
                    return redirect()->route('cart',auth()->user()->id_user)->with('success', 'Cart successfully created');
                } else {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Failed to create the cart');
                }
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecartRequest $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cart $cart)
    {
        //
    }
}
