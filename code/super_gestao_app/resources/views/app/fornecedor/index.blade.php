<h3>Fornecedor</h3>

@php

@endphp

Fornecedor: {{ $fornecedores[0]['nome'] }}
<br>
Status: {{ $fornecedores[0]['status']}}

{{-- Executa se o retorno da condição for falsa --}}
@unless($fornecedores[0]['status'] == 'S')
    <b>(Fornecedor invativo!)</b>
@endunless
