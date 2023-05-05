<?php

namespace App\Http\Controllers;

use App\Models\wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class wishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlist = wishlist::where('user_id', Auth::user()->id)->get();
        $count = $wishlist->count();
        return view('pembeli.wishlist.index', compact('wishlist', 'count'));
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
        $wishlist = wishlist::find($id);
        $wishlist->delete();
        return redirect('/wishlist');
    }

    public function storeAjax(Request $request)
    {
        $checkWishlist = wishlist::where('user_id', Auth::user()->id)->where('barang_id', $request->id_barang)->first();
        if($checkWishlist){
            $type = 'REMOVE';
            $checkWishlist->delete();
        }else{
            $type = 'ADD';
            wishlist::create([
                'user_id' => Auth::user()->id,
                'barang_id' => $request->input('id_barang'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }


        return response()->json(['type' => $type]);
    }

    public function unwishlistDetail(Request $request)
    {
        $wishlist = wishlist::where('user_id', Auth::user()->id)->where('barang_id', $request->input('id_barang'));
        $wishlist->delete();
        return "Berhasil unwishlist";
    }
}
