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

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', "%".$request->input('nome')."%")
            ->where('site', 'like', "%".$request->input('site')."%")
            ->where('uf', 'like', "%".$request->input('uf')."%")
            ->where('email', 'like', "%".$request->input('email')."%")
            ->paginate(2);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request)
    {
        $msg = '';
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

            if (empty($request->input('id'))) {
                $fornecedor = new Fornecedor();
                $fornecedor->create($request->all());
                $msg = "Cadastro realizado com sucesso.";

            } else {
                $fornecedor = Fornecedor::find($request->input('id'));

                if ($fornecedor->update($request->all())) {
                    $msg = "Cadastro atualizado com sucesso.";
                } else {
                    $msg = "Erro ao atualizar cadastro do fornecedor.";
                }

                return redirect()->route(
                    'app.fornecedor.editar',
                    ['msg' => $msg, 'id' => $request->input('id')]
                );
            }
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '')
    {
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }
}
