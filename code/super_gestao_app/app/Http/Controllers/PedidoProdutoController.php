<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\PedidoProduto;
use App\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Pedido
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => Produto::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
                
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function show(PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function edit(PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto)
    {
        //
    }
}
