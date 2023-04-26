<?php

namespace App\Http\Controllers;

use App\Models\bukti;
use App\Models\cart;
use App\Models\category;
use App\Models\invoice;
use App\Models\produk;
use App\Models\transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class orderController extends Controller
{

    public function index()
    {
        return view('pembeli.payment.checkout');
    }

    public function store(Request $request)
    {
        $cart = cart::with(['produk','user'])->where('user_id', Auth::user()->id)->get();
     
        $validate = $request->validate([
            'telp' => 'required',
            'zipcode' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'alamat' => 'required',
            'name' => 'required',
        ]);

        $request['user_id'] = Auth::user()->id;

        $request['status'] = 1;
        $inVCode = 'INV/'.Carbon::now()->format('dmY').'-'.random_int(000000, 1000000);
        $request['invoice_code'] = $inVCode;

        $inv = invoice::create($request->except('_token','province_city'));
        $invID = $inv->id;

        foreach($cart as $data){
        transaksi::create([
                'invoice_id' => $invID,
                'barang_id' => $data->barang_id ,
                'user_id' => Auth::user()->id,
                'price' => $data->produk->harga,
                'qty' => $data->qty,
            ]);
        }

        $cartFind = cart::where('user_id', Auth::user()->id);
        $cartFind->delete();

        return redirect('/payment/confirmation');
    }

    public function status($id, $inv)
    {
        $update = invoice::find($inv);

        $idStat = $id;

        if($idStat == 1){
            $idStat = 2;
        }elseif($idStat == 2){
            $idStat = 3;
        }elseif($idStat == 3){
            $idStat = 4;
        }

        $update->update([
            'status' => $idStat,
        ]);
        
        return redirect('/pesanan/'.$inv);
    }

    public function bukti(Request $request)
    {
        $ex = $request->file('img')->getClientOriginalExtension();

        $name = random_int(00000, 100000).'.'.$ex;

        $request->file('img')->storeAs('gambar', $name);

        $request['gambar'] = $name;
        $request['status'] = 1;
        bukti::create($request->except('_token','img'));
        return redirect('/payment/confirmation');
    }

    public function selesai($id)
    {
        $bukti = bukti::find($id);
        $bukti->update([
            'status' => 2
        ]);

        return redirect('/bukti');
    }

    public function searchCityPayment(Request $request)
    {
        $province_id = $request->input('province_id');
        $apiCity = Http::get('https://api.rajaongkir.com/starter/city?key=179ae16b7b1883dc77ab80d40c52d141&province='.$province_id)->json();
        return $apiCity;
    }
}
