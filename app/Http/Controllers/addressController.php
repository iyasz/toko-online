<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class addressController extends Controller
{
    public function index()
    {
        $addressMain = address::where('user_id', Auth::user()->id)->where('is_main', 2)->first();
        $addressAll = address::where('user_id', Auth::user()->id)->where('is_main', 1)->get();
        $province = Http::get('https://api.rajaongkir.com/starter/province?key=179ae16b7b1883dc77ab80d40c52d141')->json();
        return view('pembeli.payment.formulir', compact('addressAll','addressMain', 'province'));
    }

    public function store(Request $request)
    {
        $FindAddressValue = address::where('user_id', Auth::user()->id)->count();
        $request['user_id']= Auth::user()->id;
        $valueIsMain = 1;
        
        if($FindAddressValue == 0){
            $valueIsMain = 2;
        }
        
        $request['is_main']= $valueIsMain;
        address::create($request->except('_token'));
        return redirect('/payment');
    }
}
