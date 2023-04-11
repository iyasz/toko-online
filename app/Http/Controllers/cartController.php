<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\category;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = cart::with(['produk','user'])->where('user_id', Auth::user()->id)->get();
        $cat = category::all();
        $pro = produk::all();
        return view('pembeli.cart.index', ['category' => $cat, 'produk' => $pro, 'cart' => $cart, 'total' => 0]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        cart::create($request->except('_token'));

        return redirect('/cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = cart::find($id);

        $cart->delete();

        return redirect('/cart');
    }
}
