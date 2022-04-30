<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores[] = ['nome' => 'Fornecedor Exemplo', 'status' => 'N'];

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
