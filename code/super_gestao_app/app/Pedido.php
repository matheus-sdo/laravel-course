<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function produtos()
    {
        /*
            Com a classe padronizada, ficaria:
            return $this->belongsToMany('App\Produto', 'pedidos_produtos');

            Sem a classe padronizada, fica:
 
            1. Modelo do relacionamento N:N que se relaciona com a classe Pedido
            2. Tabela de relacionamento
            3. A coluna FK da tabela em questão
            4. A coluna FK da outra tabela que Pedido se relaciona
        */
        return $this->belongsToMany(
            'App\Item',
            'pedidos_produtos',
            'pedido_id',
            'produto_id'
        )->withPivot('created_at');
    }
}
