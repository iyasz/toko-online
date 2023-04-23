<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $category = category::all();
        return view('admin.category.index', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'img' => 'required',
            'name' => 'required',
        ]);

        $name = $request->name .'-'. random_int(100000, 999999);

        $request->file('img')->storeAs('gambar', $name);

        $request['icon']= $name;
        category::create($request->except('_token', 'img'));

        return redirect('/category')->with('success', 'Data Berhasil Disimpan!');
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
        $category = category::find($id);
        return view('/admin.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = category::find($id);

        $validate = $request->validate([
            'name' => 'required',
        ]);

        if($request->file('img')){

            $name = $request->name .'-'. random_int(100000, 999999);
            
            $request->file('img')->storeAs('gambar', $name);
            
            $request['icon']= $name;
        }
        $category->update($request->except('_token', 'img'));

        return redirect('/category')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = category::find($id);
        $category->delete();

        return redirect('/category')->with('success', 'Data Berhasil Dihapus!');
    }
}
