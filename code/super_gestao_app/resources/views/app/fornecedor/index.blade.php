<h3>Fornecedor</h3>

@php

@endphp

@isset($fornecedores)
    @php $i = 0 @endphp
    @while (isset($fornecedores[$i]))
        <p>Fornecedor: {{ $fornecedores[$i]['nome'] }}</p>
        <p>Status: {{ $fornecedores[$i]['status']}}</p>
        <p>CNPJ: {{ $fornecedores[$i]['cnpj'] ?? '' }}</p>
        <p>Telefone: {{ $fornecedores[$i]['ddd'] ?? '' }} {{ $fornecedores[$i]['telefone'] ?? ''}}</p>
        <hr/>
        @php $i++ @endphp
    @endwhile
@endisset
