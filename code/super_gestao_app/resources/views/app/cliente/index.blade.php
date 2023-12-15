@extends('app.layouts.basico')

@section('titulo', 'Clientes')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin: 0 auto;">
                <table border='1' width='100%'>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->nome}}</td>
                                <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a></td>
                                <td>
                                    <form id="delete_{{$cliente->id}}" method="post" action="{{ route('cliente.destroy', $cliente->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('delete_{{$cliente->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $clientes->appends($request)->links() }}
                <br>
                Exibindo {{$clientes->count()}} fornecedores de {{$clientes->total()}}
                <br>
                (de {{$clientes->firstItem()}} a {{$clientes->lastItem()}})
            </div>
        </div>
    </div>
@endsection
