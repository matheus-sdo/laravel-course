<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    protected $fillable = ['nome', 'email', 'motivo_contato', 'telefone', 'mensagem'];
}
