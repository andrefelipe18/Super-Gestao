<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;
class PrincipalController extends Controller
{
    //método get
    public function direcionamento(){

        $motivo_contatos = MotivoContato::all();
        //dd($motivo_contatos);
        return view('site.principal', ['titulo' => 'Principal', 'motivo_contatos' => $motivo_contatos]);
    }
}

