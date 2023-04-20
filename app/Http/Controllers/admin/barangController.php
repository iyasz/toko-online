<?php

namespace App\Http\Controllers\admin;

use App\Models\produk;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\character;
use App\Models\series;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = produk::all();
        $brand = brand::all();
        $series = series::all();
        $character = character::all();
        return view('admin.produk.index', compact('produk','brand','series','character'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = category::all();
        $brand = brand::all();
        $series = series::all();
        $character = character::all();
        return view('admin.produk.create', compact('category','brand','series','character'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'category_id' => 'required',
            'img' => 'required',
            'harga' => 'required',
            'produser' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'name' => 'required',
        ]);

        $original = $request->file('img')->getClientOriginalExtension();

        $name = $request->stok .'-'. random_int(100000, 999999).'.'.$original;

        $request->file('img')->storeAs('gambar', $name);

        $request['image']= $name;
        $validateSlug = preg_replace('/\[[^\]]*\]/', '', $request->name); 
        $request['slug'] = Str::slug($validateSlug); 
        produk::create($request->except('_token', 'img'));

        return redirect('/produk')->with('success', 'Data Berhasil Disimpan!');
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
        $produk = produk::find($id);
        $category = category::all();
        $brand = brand::all();
        $series = series::all();
        $character = character::all();
        return view('admin.produk.create', compact('category','brand','series','character', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = produk::find($id);
        $validate = $request->validate([
            'category_id' => 'required',
            'harga' => 'required',
            'produser' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'name' => 'required',
        ]);

        if($request->img){
            $original = $request->file('img')->getClientOriginalExtension();
            $name = $request->stok .'-'. random_int(100000, 999999).'.'.$original;
            
            $request->file('img')->storeAs('gambar', $name);
            $request['image']= $name;
        }

        $validateSlug = preg_replace('/\[[^\]]*\]/', '', $request->name); 
        $request['slug'] = Str::slug($validateSlug); 

        $produk->update($request->except('_token', 'img'));

        return redirect('/produk')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = produk::find($id);
        $produk->delete();

        return redirect('/produk')->with('success', 'Data Berhasil Dihapus!');
    }
}
