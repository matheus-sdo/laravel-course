<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = null;

        if ($request->get('erro') == 1) {
            $erro = "Usuário ou senha incorreta.";
        }

        if ($request->get('erro') == 2) {
            $erro = "Necessário realizar login para ter acesso a página.";
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'usuario' => 'required|email',
            'senha'   => 'required',
        ];

        $feedback = [
            'usuario.email'    => 'O campo usuário deve conter um e-mail válido!',
            'usuario.required' => 'O campo usuário é obrigatório',
            'senha.required'   => 'O campo senha é obrigatório',
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        // Iniciando model User
        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if (empty($usuario)) {
            return redirect()->route('site.login', ['erro' => 1]);
        } else {
            session_start();
            $_SESSION['nome']  = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('cliente.index');
        }
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
