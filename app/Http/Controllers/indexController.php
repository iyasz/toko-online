<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\produk;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    public function index()
    {
        $produkSelect = produk::latest('created_at')->take(6)->get();
        $produk = produk::get();
        $cat = category::all();
        return view('pembeli.home', ['category' => $cat, 'produk' => $produkSelect, 'AllProduct' => $produk]);
    }

    public function confirm()
    {
        return view('pembeli.confirm.index');
    }

    public function product($id)
    {
        $produk = produk::findOrFail($id);
        $wishlist = 0;
        if(Auth::user()){
            $wishlist = wishlist::where('barang_id', $id)->where('user_id', Auth::user()->id)->count();
        }

        $items = produk::orWhere('character_id', $produk->character->id)
            ->orWhere('series_id', $produk->series->id)
            ->inRandomOrder()
            ->take(20)
            ->get();

        return view('pembeli.produk.detail', compact('produk', 'wishlist', 'items'));
    }

    public function category($id)
    {
        $cat = category::find($id);
        $pro = produk::where('category_id', $id)->get();
        return view('category', compact('pro','cat'));
    }

    public function search()
    {
        $produk = produk::where('name', 'like', '%'.$_GET['q'].'%')->get();
        $count = $produk->count();
        return view('search', compact('produk', 'count'));
    }
}
