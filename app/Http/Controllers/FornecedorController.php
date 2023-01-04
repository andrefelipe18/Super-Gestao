<?php

namespace App\Http\Controllers;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(Request $request){
        return view('app.fornecedor.index', ['titulo' => 'Fornecedores']);
    }
    public function listar(Request $request){
        //Fazer a consulta no banco de dados
      //  $fornecedores = Fornecedor::all();
        $fornecedores = Fornecedor::with('produtos')->where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->paginate(5);
        //->get();
        //Retornar a view com os dados
        return view('app.fornecedor.listar', ['titulo' => 'Listar Fornecedores', 'fornecedores' => $fornecedores, 'request' => $request->all()]);
    }
    public function adicionar(Request $request){
        if($request->input('_token') != '' && $request->input('id') == ''){
            $regras = [
                'nome' => 'required|min:3|max:40|unique:fornecedores',
                'site' => 'required',
                'uf' => 'required',
                'email' => 'required|email',
            ];
            $mensagens = [
                'nome.required' => 'O campo nome é obrigatório',
                'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
                'nome.unique' => 'O nome informado já está em uso',
                'site.required' => 'O campo site é obrigatório',
                'uf.required' => 'O campo UF é obrigatório',
                'email.required' => 'O campo email é obrigatório',
                'email.email' => 'O campo email precisa ser um email válido',
                'Required' => 'O campo :attribute deve ser preenchida',
            ];
            $request->validate($regras, $mensagens);
            Fornecedor::create($request->all());
        }
        if($request->input('_token') != '' && $request->input('id') != ''){
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required',
                'email' => 'required|email',
            ];
            $mensagens = [
                'nome.required' => 'O campo nome é obrigatório',
                'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
                'site.required' => 'O campo site é obrigatório',
                'uf.required' => 'O campo UF é obrigatório',
                'email.required' => 'O campo email é obrigatório',
                'email.email' => 'O campo email precisa ser um email válido',
                'Required' => 'O campo :attribute deve ser preenchida',
            ];
            $request->validate($regras, $mensagens);
            Fornecedor::find($request->input('id'))->update($request->all());

            return redirect()->route('app.fornecedor.editar', ['titulo' => 'Atualizar Fornecedor', 'id' => $request->input('id')]);
        }
        return view('app.fornecedor.adicionar', ['titulo' => 'Adicionar Fornecedores']);
    }
    public function editar($id, Request $request){
        $fornecedor = Fornecedor::find($id);

        //Retornando a view com os dados
        return view('app.fornecedor.adicionar', ['titulo' => 'Editar Fornecedores', 'fornecedor' => $fornecedor]);
    }
    public function excluir($id){

        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }
}
