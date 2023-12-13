<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Item;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // Regras de validação das requests de atualização e criação de registros
    public $regras = [
        'nome'       => 'required|min:3|max:40',
        'descricao'  => 'required|min:3|max:2000',
        'peso'       => 'required|integer',
        'unidade_id' => 'required|exists:unidades,id',
    ];

    public $feedback = [
        'required' => 'O campo :attribute deve ser preenchido',
        'min' => 'O campo :attribute deve ter no mínimo 3 caracteres',
        'nome.max' => 'O campo :attribute deve ter no máximo 40 caracteres',
        'descricao.max' => 'O campo :attribute deve ter no máximo 2000 caracteres',
        'peso.integer' => 'O campo :attribute deve ser um número inteiro',
        'unidade_id.exists' => 'A unidade informada não existe',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Item::paginate(10);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->regras, $this->feedback);
        Item::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $request->validate($this->regras, $this->feedback);
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
