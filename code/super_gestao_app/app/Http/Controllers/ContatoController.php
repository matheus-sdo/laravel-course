<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivoContatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivoContatos]);
    }

    public function salvar(Request $request)
    {
        $regras = [
            'nome'               => 'required|min:3|max:50|unique:site_contatos',
            'telefone'           => 'required',
            'email'              => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem'           => 'required|max:2000',
        ];

        $feedback = [
            'nome.min'                    => 'O campo "Nome" precisa ter no mínimo 3 caracteres.',
            'nome.max'                    => 'O campo "Nome" precisa ter no máximo 40 caracteres.',
            'nome.unique'                 => 'O nome informado já está em uso.',
            'email.email'                 => 'O e-mail inserido não é valido.',
            'motivo_contatos_id.required' => 'Selecione um motivo de contato.',
            'required'                    => 'O campo ":attribute" é obrigatório.',
            'mensagem.max'                => "A mensagem deve ter no máximo 2000 caracteres."
        ];

        // Validando se os campos do formulário estão preenchidos e retornando erros personalizados
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
