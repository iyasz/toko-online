<?php

namespace App\Http\Middleware;

use App\Models\address;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class addressRequired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $addressValue = address::where('user_id', Auth::user()->id)->count();
        if($addressValue == 0){
            abort(404);
        }
        return $next($request);
    }
}
