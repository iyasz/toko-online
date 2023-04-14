<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\produk;
use Illuminate\Http\Request;

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
        $cat = category::all();
        return view('pembeli.confirm.index', ['category' => $cat]);
    }

    public function product($id)
    {
        $pro = produk::find($id);
        return view('pembeli.produk.detail', ['produk' => $pro]);
    }

    public function category($id)
    {
        $cat = category::find($id);
        $pro = produk::where('category_id', $id)->get();
        return view('category', compact('pro','cat'));
    }
}
