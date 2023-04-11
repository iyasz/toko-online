<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index()
    {
        $cat = category::all();
        return view('pembeli.payment.formulir', ['category' => $cat]);
    }
}
