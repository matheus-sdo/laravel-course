@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{ $msg ?? '' }}
            <div style="width: 30%; margin: 0 auto;">
                <form method="post" action="{{ route('produto.store') }}">
                    @csrf

                    <input type="text" name="nome" placeholder="Nome" class="borda-preta"  value="{{old('nome')}}">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text" name="descricao" placeholder="Descrição" class="borda-preta"  value="{{old('descricao')}}">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

                    <input type="text" name="peso" placeholder="Peso" class="borda-preta" value="{{old('peso')}}">
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}

                    <select name="unidade_id">
                        <option>-- Selecione a unidade --</option>
                        
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}"  {{ old("unidade_id") == $unidade->id ? 'selected' : ''}}>
                                {{$unidade->descricao}}
                            </option>
                        @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}


                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
