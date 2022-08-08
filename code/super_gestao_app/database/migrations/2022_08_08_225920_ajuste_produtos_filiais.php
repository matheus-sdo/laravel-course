<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Criando tabela filiais
        Schema::create(
            'filiais',
            function (Blueprint $table)
            {
                $table->id();
                $table->string('filial', 30);
                $table->timestamps();
            }
        );

        // Criando tabela produto_filiais
        Schema::create(
            'produtos_filiais',
            function (Blueprint $table)
            {
                $table->id();
                $table->unsignedBigInteger('filial_id');
                $table->unsignedBigInteger('produto_id');
                $table->float('preco_venda', 8, 2);
                $table->integer('estoque_minimo');
                $table->integer('estoque_maximo');
                $table->timestamps();

                // Criando chaves estrangeiras
                $table->foreign('filial_id')->references('id')->on('filiais');
                $table->foreign('produto_id')->references('id')->on('produtos');
            }
        );

        // Removendo campos que foram transferidos para a nova tabela
        Schema::table(
            'produtos',
            function (Blueprint $table)
            {
                $table->dropColumn(['preco_venda', 'estoque_maximo', 'estoque_minimo']);
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
