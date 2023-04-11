<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\produk;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $produkSelect = produk::where('stok', '>', 0)->get();
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
        $cat = category::all();
        $pro = produk::find($id);
        return view('pembeli.produk.detail', ['category' => $cat, 'produk' => $pro]);
    }
}
