<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        // Criando a coluna em produtos que vai receber a FK de fornecedores
        Schema::table(
            'produtos',
            function(Blueprint $table)
            {
                // Inserindo registro de fornecedor auxiliar para estabelecer o relacionamento
                $fornecedor_id = DB::table('fornecedores')->insertGetId(
                    [
                        'nome' => 'Fornecedor Padrão SG',
                        'uf'   => 'SP',
                        'site' => 'padrao.com.br',
                        'email' => 'padrao@padrao.com'
                    ]
                );

                $table->unsignedBigInteger('fornecedor_id')->after('id')->default($fornecedor_id);
                $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
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
        Schema::table(
            'produtos',
            function(Blueprint $table)
            {
                $table->dropForeign('produtos_fornecedor_id_foreign');
                $table->dropColumn('fornecedor_id');
            }
        );
    }
}
