<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    // Ajustando nome da tabela
    protected $table = "fornecedores";

    // Permitindo que estes parâmetros sejam recebidos pelo método create
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
