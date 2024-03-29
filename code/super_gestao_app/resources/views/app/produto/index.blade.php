@extends('app.layouts.basico')

@section('titulo', 'Produtos')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin: 0 auto;">
                <table border='1' width='100%'>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Site do Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td>{{$produto->fornecedor->nome}}</td>
                                <td>{{$produto->fornecedor->site}}</td>
                                <td>{{$produto->peso}}</td>
                                <td>{{$produto->unidade_id}}</td>
                                <th>{{$produto->comprimento ?? ''}}</th>
                                <th>{{$produto->altura ?? ''}}</th>
                                <th>{{$produto->largura ?? ''}}</th>
                                <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                                <td>
                                    <form id="delete_{{$produto->id}}" method="post" action="{{ route('produto.destroy', $produto->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('delete_{{$produto->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="12">
                                    <p>Pedidos com este produto:</p>
                                    @foreach ($produto->pedidos as $pedido)
                                        <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                                            {{$pedido->id}}
                                        </a>
                                    @endforeach
                                </td>                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $produtos->appends($request)->links() }}
                <br>
                Exibindo {{$produtos->count()}} fornecedores de {{$produtos->total()}}
                <br>
                (de {{$produtos->firstItem()}} a {{$produtos->lastItem()}})
            </div>
        </div>
    </div>
@endsection
