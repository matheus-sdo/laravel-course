<h3>Fornecedor</h3>

@php

@endphp


@if (count($fornecedores) && count($fornecedores) < 10)
    <h3>Existem menos que 10 fornecedores cadastrados</h3>
@elseif (count($fornecedores) > 10)
    <h3>Existe mais que 10 fornecedores cadastrados</h3>
@else
    <h3>Nenhum fornecedor cadastrado</h3>
@endif
