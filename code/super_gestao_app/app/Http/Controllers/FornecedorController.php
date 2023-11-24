<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar()
    {
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request)
    {
        if (!empty($request->input('_token'))) {
            // Validação dos dados
            $regras = [
                'nome'  => 'required|min:3|max:40',
                'site'  => 'required',
                'uf'    => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'required'    => 'O campo :attribute deve ser preenchido',
                'nome.min'    => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max'    => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min'      => 'O campo UF deve ter no mínimo 2 caracteres',
                'uf.max'      => 'O campo UF deve ter no máximo 2 caracteres',
                'email.email' => 'E-mail inválido'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
        }

        return view('app.fornecedor.adicionar');
    }
}
