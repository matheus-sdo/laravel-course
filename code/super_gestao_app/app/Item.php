<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['unidade_id', 'descricao', 'nome', 'peso', 'fornecedor_id'];

    /**
     * Informando ao Eloquent ORM que um Produto é relacionado à um registro na tabela produto_detalhes
     */
    public function itemDetalhe()
    {
        // Model de relação, FK na tabela produtos_detalhes, PK na tabela produtos
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    }

    /**
     * Informando ao Eloquent ORM que um produto pertence à um fornecedor
     */
    public function fornecedor()
    {
        // Model de relação, FK na tabela produtos_detalhes, PK na tabela produtos
        return $this->belongsTo('App\Fornecedor');
    }

    /**
     * Estabelecendo relação N:N no Eloquent ORM com a tabela pedidos
     */
    public function pedidos()
    {
        /*
            1. Modelo do relacionamento N:N que se relaciona com a classe Pedido
            2. Tabela de relacionamento
            3. A coluna FK da tabela em questão
            4. A coluna FK da outra tabela que Pedido se relaciona
        */

        return $this->belongsToMany(
            'App\Pedido',
            'pedidos_produtos',
            'produto_id',
            'pedido_id'
        );
    }
}
