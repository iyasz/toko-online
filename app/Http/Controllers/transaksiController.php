<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\invoice;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class transaksiController extends Controller
{
    public function index()
    {
        $trxActiveStatus = invoice::with(['transaksi.produk'])->where('user_id', Auth::user()->id)->where('payment_status', 1)->get();
        $trxPaidStatus = invoice::where('user_id', Auth::user()->id)->where('payment_status', 2)->get();
        $trxExpiredStatus = invoice::where('user_id', Auth::user()->id)->where('payment_status', 3)->get();
        return view('pembeli.transaksi.transaksi', compact('trxActiveStatus','trxPaidStatus', 'trxExpiredStatus'));
    }

    public function riwayat()
    {
        $trx = invoice::where('user_id', Auth::user()->id)->where('status', 5)->get();
        return view('pembeli.transaksi.riwayat', compact('trx'));
    }

    public function view($id)
    {
        $detail = transaksi::where('invoice_id', $id)->get();
        return view('pembeli.transaksi.detail', compact('detail'))  ;
    }
}
