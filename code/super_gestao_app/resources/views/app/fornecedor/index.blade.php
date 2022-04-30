<h3>Fornecedor</h3>

@php

@endphp

@isset($fornecedores)
    @forelse ($fornecedores as $key => $fornecedor)
        <p>Fornecedor: {{ $fornecedor['nome'] }}</p>
        <p>Status: {{ $fornecedor['status']}}</p>
        <p>CNPJ: {{ $fornecedor['cnpj'] ?? '' }}</p>
        <p>Telefone: {{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['telefone'] ?? ''}}</p>
        <hr/>

    @empty
        Não existem fornecedores cadastrados.
    @endforelse
@endisset
