<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Etablissement;

class HomeController extends Controller
{
    public function index($id, $name){
        $etablissement = Etablissement::where('id',$id);
        if($etablissement->count()){
            foreach(Auth::user()->etablissements as $test){
                if($test->pivot->etablissement_id==$id){

                    $e = new Etablissement();
                    $e->create_session($id, $etablissement->first()->nom);
                    return Inertia::render('Accueil');
                }
            }
        }
        //alert("Vous n'avez pas accés à cet établissement");
        return redirect()->route('etablissement.index');
    }

    public function redirect(){

        if(!is_null(session('etablissement_id')) && !is_null(session('etablissement_name'))){
            return redirect()->route('home', [
                "id" => session('etablissement_id'),
                "name" => session('etablissement_name')
            ]);
        }
        return redirect()->route('etablissement.index');
    }
}
