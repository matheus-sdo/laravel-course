<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    // implementando soft delete
    use SoftDeletes;

    // Ajustando nome da tabela
    protected $table = "fornecedores";

    // Permitindo que estes parâmetros sejam recebidos pelo método create
    protected $fillable = ['nome', 'site', 'uf', 'email'];


}
