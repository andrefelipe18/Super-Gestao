<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuário ou senha inválidos!';
        }
        else if($request->get('erro') == 2){
            $erro = 'Necessário realizar o login para acessar o sistema!';
        }
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }
    public function autenticar(Request $request){
            //Regras de validação
            $regras = [
            'usuario' => 'email',
            'senha' => 'required|min:3'
            ];
            //Mensagens de validação
            $mensagens = [
            'usuario.email' => 'O campo usuário precisa ser um e-mail válido',
            'senha.required' => 'O campo senha é obrigatório',
            'senha.min' => 'O campo senha precisa ter no mínimo 3 caracteres',
            ];
            //Validação
            $request->validate($regras, $mensagens);

            //Recuperando as informações do formulário
            $email = $request->get('usuario');
            $password = $request->get('senha');

           //Iniciar o model user
           $user = new User();
           //Verificar se o usuário existe
           $usuario = $user->where('email', $email)
           ->where('password', $password)
           ->get()
           ->first();
           //Caso o usuário exista
           if(isset($usuario->name)){

            //Criar uma sessão para o usuário
            session_start(); //Iniciar a sessão
            $_SESSION['name'] = $usuario->name; //Definindo indices e valores
            $_SESSION['email'] = $usuario->email; //Definindo indices e valores

            return redirect()->route('app.home'); //Redirecionando para a rota app.clientes
            } else{ //Caso o usuário não exista

            return redirect()->route('site.login', ['erro' => 1]);

            }

    }
    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
