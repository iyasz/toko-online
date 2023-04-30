<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\cart;
use App\Models\category;
use App\Models\produk;
use Carbon\Carbon;
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
        $cartCount = $cart->count();
        $cat = category::all();
        $pro = produk::all();
        return view('pembeli.cart.index', ['category' => $cat, 'produk' => $pro, 'cart' => $cart, 'count' => $cartCount]);
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
        
        cart::create([
            'user_id' => Auth::user()->id,
            'barang_id' => $request->input('id_barang'),
            'qty' => $request->input('qtyProduct'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

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

    public function storeAjax(Request $request)
    {

        $validate = cart::where('user_id', Auth::user()->id)
                    ->where('barang_id', $request->input('id_barang'))
                    ->get();


        if($validate->count() == 0){   
            cart::create([
                'user_id' => Auth::user()->id,
                'barang_id' => $request->input('id_barang'),
                'qty' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        return response()->json($validate);
    }

    public function cartSearchValueAddress()
    {
        $address = address::where('user_id', Auth::user()->id)->get()->count();
        
        return $address;
    }

    public function removeAllProductFromCart()
    {
        $cartAll = cart::where('user_id', Auth::user()->id);
        $cartAll->delete();
        return 'berhasil';
    }
}
