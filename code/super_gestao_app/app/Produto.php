<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['unidade_id', 'descricao', 'nome', 'peso'];
}
