@if (isset($produto->id))
    <form method="post" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('produto.store') }}">
        @csrf
@endif

        <input type="text" name="nome" placeholder="Nome" class="borda-preta"  value="{{$produto->nome ?? old('nome')}}">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}

        <input type="text" name="descricao" placeholder="Descrição" class="borda-preta"  value="{{$produto->descricao ?? old('descricao')}}">
        {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

        <input type="text" name="peso" placeholder="Peso" class="borda-preta" value="{{$produto->peso ?? old('peso')}}">
        {{ $errors->has('peso') ? $errors->first('peso') : '' }}

        <select name="unidade_id">
            <option>-- Selecione a unidade --</option>
            
            @foreach ($unidades as $unidade)
                <option value="{{ $unidade->id }}"  {{ ($produto->unidade_id ?? old("unidade_id")) == $unidade->id ? 'selected' : ''}}>
                    {{$unidade->descricao}}
                </option>
            @endforeach
        </select>
        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}


        <button type="submit" class="borda-preta">
            @if (isset($produto->id))
                Atualizar
            @else
                Cadastrar
            @endif
        </button>
    </form>