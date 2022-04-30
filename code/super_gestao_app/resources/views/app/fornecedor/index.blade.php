<h3>Fornecedor</h3>

@php

@endphp

@isset($fornecedores)
    @forelse ($fornecedores as $key => $fornecedor)
        <p>Iteração atual: {{ $loop->iteration }}</p>
        <p>Fornecedor: {{ $fornecedor['nome'] }}</p>
        <p>Status: {{ $fornecedor['status']}}</p>
        <p>CNPJ: {{ $fornecedor['cnpj'] ?? '' }}</p>
        <p>Telefone: {{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['telefone'] ?? ''}}</p>

        @if ($loop->first)
            <p>Primeiro iteração do loop</p>
        @endif

        @if ($loop->last)
            <p>Último iteração do loop</p>
            <p>Total de itens percorridos: {{ $loop->count }}</p>
        @endif
        <hr/>

    @empty
        Não existem fornecedores cadastrados.
    @endforelse
@endisset
