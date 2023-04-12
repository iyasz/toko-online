<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\invoice;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class transaksiController extends Controller
{
    public function index()
    {
        $cat = category::all();
        $trx = invoice::where('user_id', Auth::user()->id)->get();
        return view('pembeli.transaksi.transaksi', ['category' => $cat, 'trx' => $trx]);
    }

    public function riwayat()
    {
        $cat = category::all();
        $trx = invoice::where('user_id', Auth::user()->id)->where('status', 5)->get();
        return view('pembeli.transaksi.riwayat', ['category' => $cat, 'trx' => $trx]);
    }

    public function view($id)
    {
        $cat = category::all();
        $detail = transaksi::where('invoice_id', $id)->get();
        return view('pembeli.transaksi.detail', ['detail' => $detail, 'category' => $cat])  ;
    }
}
