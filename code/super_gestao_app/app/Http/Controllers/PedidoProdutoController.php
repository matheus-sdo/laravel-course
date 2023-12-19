<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\PedidoProduto;
use App\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    protected $regras = [
        'produto_id' => 'exists:produtos,id',
        'quantidade' => 'required',
    ];

    protected $feedback = [
        'produto_id.exists' => 'O produto inserido não existe.',
        'required' => 'O campo :attribute deve ser preenchido com um valor válido.',
    ];

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
        $pedido->produtos; // eager loading
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
        $request->validate($this->regras, $this->feedback);

        // $pedidoProduto = new PedidoProduto();
        // $pedidoProduto->pedido_id = $pedido->id;
        // $pedidoProduto->produto_id = $request->get('produto_id');
        // $pedidoProduto->quantidade = $request->get('quantidade');
        // $pedidoProduto->save();

        // $pedido->produtos
        // Quando chamamos assim, como retorno os registros do relacionamento. Da forma que está abaixo, é retornado um objeto da relação 

        $pedido->produtos()->attach(
            $request->get('produto_id'),
            ['quantidade' => $request->get('quantidade')]
        );

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function show(PedidoProduto $pedidoProduto)
    {
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
        // // Implementando o delete pelo relacionamento
        // $pedido->produtos()->detach(
        //     $produto->id
        // );

        // Implementando o delete da relação em específico
        $pedidoProduto->delete();

        return redirect()->route('pedido-produto.create', ['pedido' => $pedidoProduto->pedido_id]);
    }
}
