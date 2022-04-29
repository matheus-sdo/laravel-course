<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PrincipalController@principal');

Route::get('/sobre-nos', 'SobreNosController@sobreNos');

Route::get('/contato', 'ContatoController@contato');

Route::get('/login', function() { return 'login'; });

Route::get('/clientes', function() { return 'clientes'; });

Route::get('/fornecedores', function() { return 'fornecedores'; });

Route::get('/produtos', function() { return 'produtos'; });

/* Teste com passagem de parãmetros

Route::get(
    '/contato/{nome}/{categoria_id}',
    function(
        string $nome = "Desconhecido",
        int $categoria_id = 1
    ) {
        // 1 - Informação
        echo "Estamos aqui, {$nome}! <br>{$categoria_id}";
    }
)->where('categoria_id', '[0-9]+')
->where('nome', '[A-Za-z]+');
*/
