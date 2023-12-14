@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar detalhes do produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <h4>Produto</h4>
            <p>Nome: {{$produto_detalhe->item->nome ?? ''}}</p>
            <p>Descrição: {{$produto_detalhe->item->descricao ?? ''}}</p>

            {{ $msg ?? '' }}
            <div style="width: 30%; margin: 0 auto;">
                @component(
                    'app.produto_detalhe._components.form_create_edit',
                    ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades]
                )
                @endcomponent
            </div>
        </div>
    </div>
@endsection
