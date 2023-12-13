<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['unidade_id', 'descricao', 'nome', 'peso'];

    /**
     * Informando ao Eloquent ORM que um Produto é relacionado à um registro na tabela produto_detalhes
     */
    public function produtoDetalhe()
    {
        return $this->hasOne('App\ProdutoDetalhe');
    }
}
