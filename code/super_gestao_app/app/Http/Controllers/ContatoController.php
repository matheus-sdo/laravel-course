<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivoContatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivoContatos]);
    }

    public function salvar(Request $request)
    {
        // Validando se os campos do formulário estão preenchidos
        $request->validate(
            [
                'nome'               => 'required|min:3|max:50',
                'telefone'           => 'required',
                'email'              => 'email',
                'motivo_contatos_id' => 'required',
                'mensagem'           => 'required|max:2000',
            ],
        );

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
