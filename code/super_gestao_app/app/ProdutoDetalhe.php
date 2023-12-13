<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    /**
     * Informando ao Eloquent ORM que este model se relaciona com a tabela Produto
     */
    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }
}
