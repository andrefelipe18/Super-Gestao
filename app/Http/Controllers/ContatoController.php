<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    //metodo get
    public function principal(Request $request){

        $motivo_contatos = MotivoContato::all();
        //dd($motivo_contatos);
        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);

    }
    //metodo post
    public function save(Request $request){
        //Realizar a validação dos dados
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|min:10|max:2000'
        ];
        $mensagens = [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'telefone.required' => 'O campo telefone é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email precisa ser um email válido',
            'mensagem.min' => 'O campo mensagem precisa ter no mínimo 10 caracteres',
            'mensagem.max' => 'O campo mensagem precisa ter no máximo 2000 caracteres',
            'mensagem.required' => 'O campo mensagem é obrigatório',
            'motivo_contatos_id.required' => 'O campo motivo é obrigatório',
            'Required' => 'O campo :attribute deve ser preenchida',
        ];
        $request->validate($regras, $mensagens);

        //Criando um registro no banco de dados
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}

