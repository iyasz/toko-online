<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\character;
use Illuminate\Http\Request;

class characterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $character = character::all();
        return view('admin.character.index', compact('character'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.character.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
        ]);

        character::create($request->except('_token'));

        return redirect('/character')->with('success', 'Data Berhasil Disimpan!');
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
        $character = character::find($id);
        return view('/admin.character.edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $character = character::find($id);

        $validate = $request->validate([
            'name' => 'required',
        ]);

        $character->update($request->except('_token'));

        return redirect('/character')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $character = character::find($id);
        $character->delete();

        return redirect('/character')->with('success', 'Data Berhasil Dihapus!');
    }
}
