<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['unidade_id', 'descricao', 'nome', 'peso'];

    /**
     * Informando ao Eloquent ORM que um Produto é relacionado à um registro na tabela produto_detalhes
     */
    public function itemDetalhe()
    {
        // Model de relação, FK na tabela produtos_detalhes, PK na tabela produtos
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    }
}
