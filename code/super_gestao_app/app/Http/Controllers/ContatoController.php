<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        return view('site.contato', ['titulo' => 'Contato (teste)']);
    }

    public function salvar(Request $request)
    {
        // Validando se os campos do formulário estão preenchidos
        $request->validate(
            [
                'nome'           => 'required',
                'telefone'       => 'required',
                'email'          => 'required',
                'motivo_contato' => 'required',
                'mensagem'       => 'required',
            ],
        );

        SiteContato::create($request->all());
    }
}
