<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores[] = [
            'nome'     => 'Charli XCX',
            'status'   => 'N',
            'cnpj'     => '68.156.220/0001-42',
            'ddd'      => '11',
            'telefone' => '96385-2741'
        ];

        $fornecedores[] = [
            'nome'     => 'Kim Petras',
            'status'   => 'N',
            'cnpj'     => '40.332.845/0001-07',
            'ddd'      => '19',
            'telefone' => '93682-5714'
        ];

        $fornecedores[] = [
            'nome'     => 'Rina Sawayama',
            'status'   => 'S',
            'cnpj'     => '02.841.869/0001-94',
            'ddd'      => '85',
            'telefone' => '94765-4321'
        ];

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
