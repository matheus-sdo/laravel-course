<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Adicionando a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table)
            {
                $table->unsignedBigInteger('motivo_contatos_id');
            }
        );

        // Atribuindo dado da antiga coluna para a nova
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        // Criando a FK e remover a coluna antiga
        Schema::table('site_contatos', function (Blueprint $table)
            {
                $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
                $table->dropColumn('motivo_contato');
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
        // Criando novamente a coluna removida e removendo a FK
        Schema::table('site_contatos', function (Blueprint $table)
            {
                $table->integer('motivo_contato');
                $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
            }
        );

        // Atribuindo dado da nova coluna para a antiga
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        // Removendo a coluna criada
        Schema::table('site_contatos', function (Blueprint $table)
            {
                $table->dropColumn('motivo_contatos_id');
            }
        );
    }
}
