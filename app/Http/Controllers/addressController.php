<?php

namespace App\Http\Controllers;

use App\Models\address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class addressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addressMain = address::where('user_id', Auth::user()->id)->where('is_main', 2)->first();
        $addressAll = address::where('user_id', Auth::user()->id)->where('is_main', 1)->get();
        $province = Http::get('https://api.rajaongkir.com/starter/province?key=179ae16b7b1883dc77ab80d40c52d141')->json();
        return view('pembeli.payment.formulir', compact('addressAll','addressMain', 'province'));
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
        $validate = $request->validate([
            'name' => 'required',
            'province' => 'required',
            'province_id' => 'required',
            'city' => 'required',
            'city_id' => 'required',
            'street' => 'required',
            'zipcode' => 'required',
            'telp' => 'required',
        ]);
        $FindAddressValue = address::where('user_id', Auth::user()->id)->count();
        $request['user_id']= Auth::user()->id;
        $valueIsMain = 1;
        
        if($FindAddressValue == 0){
            $valueIsMain = 2;
        }
        
        $request['is_main']= $valueIsMain;
        address::create($request->except('_token'));
        return redirect('/user/address');
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
        $addressMain = address::where('user_id', Auth::user()->id)->where('is_main', 2)->first();
        $addressMain->update([
            'is_main' => 1
        ]);

        $address = address::findOrFail($id);
        $address->update([
            'is_main' => 2
        ]);

        return "berhasil";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = address::findOrFail($id);
        $address->delete();
        return 'success';
    }

    public function searchCity(Request $request)
    {
        $province_id = $request->input('province_id');
        $apiCity = Http::get('https://api.rajaongkir.com/starter/city?key=179ae16b7b1883dc77ab80d40c52d141&province='.$province_id)->json();
        return $apiCity;
    }

    public function dataEdit(string $id, Request $request)
    {
        // $province_id = $request->input('province_id');
        // $apiCity = Http::get('https://api.rajaongkir.com/starter/city?key=179ae16b7b1883dc77ab80d40c52d141&province='.$province_id)->json();
        $address = address::findOrFail($id);
        return response($address);
    }
}
