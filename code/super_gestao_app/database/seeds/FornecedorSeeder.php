<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criando registro pela instância do objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Tiffany Hwang';
        $fornecedor->site = 'tiffanyhwang.com';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'tiffany@mail.com';
        $fornecedor->save();

        // Criando registro pelo método create
        Fornecedor::create(
            [
                'nome'  => 'Megan Thee',
                'site'  => 'megan.com',
                'uf'    => 'MG',
                'email' => 'megan@mail.com'
            ]
        );

        // Criando registro pelo método insert
        DB::table('fornecedores')->insert(
            [
                'nome'  => 'Dua Lipa',
                'site'  => 'lipa.com',
                'uf'    => 'CE',
                'email' => 'dua@mail.com'
            ]
        );
    }
}
