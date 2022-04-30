<h3>Fornecedor</h3>

@php

@endphp

@isset($fornecedores)
    @for($i = 0; isset($fornecedores[$i]); $i++)
        <p>Fornecedor: {{ $fornecedores[$i]['nome'] }}</p>
        <p>Status: {{ $fornecedores[$i]['status']}}</p>
        <p>CNPJ: {{ $fornecedores[$i]['cnpj'] ?? '' }}</p>
        <p>Telefone: {{ $fornecedores[$i]['ddd'] ?? '' }} {{ $fornecedores[$i]['telefone'] ?? ''}}</p>
        <hr/>
    @endfor
@endisset
