<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contato = new SiteContato();
        $contato->nome = "Teste Interno";
        $contato->telefone = "(19) 99999-8888";
        $contato->email = "teste@sg.com";
        $contato->motivo_contato = 1;
        $contato->mensagem = "Olá! Seja bem-vindo!";
    }
}
