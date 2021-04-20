<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Etablissement;

class VerifySessionEtablissement
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
        if(!is_null(session('etablissement_id')) && !is_null(session('etablissement_name'))){
            $etablissement = Etablissement::where('id',session('etablissement_id'));
            if($etablissement->count()){
                foreach(Auth::user()->etablissements as $test){
                    if($test->pivot->etablissement_id==session('etablissement_id')){
                        return $next($request);
                    }
                }
            }
        }
        return redirect()->route('etablissement.index');
    }
}
