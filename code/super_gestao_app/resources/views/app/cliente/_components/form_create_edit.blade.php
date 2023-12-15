@if (isset($cliente->id))
    <form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('cliente.store') }}">
        @csrf
@endif

        <input type="text" name="nome" placeholder="Nome" class="borda-preta"  value="{{$cliente->nome ?? old('nome')}}">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}

        <button type="submit" class="borda-preta">
            @if (isset($cliente->id))
                Atualizar
            @else
                Cadastrar
            @endif
        </button>
    </form>