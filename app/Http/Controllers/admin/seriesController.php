<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\series;
use Illuminate\Http\Request;

class seriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = series::all();
        return view('admin.series.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.series.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
        ]);

        series::create($request->except('_token'));

        return redirect('/series')->with('success', 'Data Berhasil Disimpan!');
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
        $series = series::find($id);
        return view('/admin.series.edit', compact('series'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $series = series::find($id);

        $validate = $request->validate([
            'name' => 'required',
        ]);

        $series->update($request->except('_token'));

        return redirect('/series')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $series = series::find($id);
        $series->delete();

        return redirect('/series')->with('success', 'Data Berhasil Dihapus!');
    }
}
