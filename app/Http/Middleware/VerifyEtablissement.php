<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Etablissement;
use Inertia\Inertia;

class VerifyEtablissement
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::user()->etablissements->count()){
            return $next($request);
        }
        session()->flush();
        return redirect()->route('login');
    }
}
