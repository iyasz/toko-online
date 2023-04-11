<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->regenerateToken();
        $request->session()->invalidate();

        return redirect('/auth/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            if(Auth::user()->role_id == 1){
                return redirect('/app');
            }else{
                return redirect('/store');
            }

        }

        return back()->withErrors([
            'email' => 'error',
        ])->onlyInput('email');

    }

    public function register(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);

        $request['role_id'] = 2;
        $request['is_active'] = 1;
        $request['created_at'] = Carbon::now();
        $request['updated_at'] = Carbon::now();

        $request['password'] = password_hash($request->password, PASSWORD_BCRYPT);

        User::create($request->except('_token'));

        return redirect('/auth/login');
    }
}
