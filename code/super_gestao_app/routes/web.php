<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AutenticacaoMiddleware;
use App\Http\Middleware\LogAcessoMiddleware;

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

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get('/login', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(
    function()
    {
        Route::get('/clientes', function() { return 'clientes'; })->name('app.clientes');
        Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
        Route::get('/produtos', function() { return 'produtos'; })->name('app.produtos');
    }
);

Route::fallback(
    function()
    {
        echo 'Ops! A página acessada não existe! <a href="'.route('site.index').'">Clique aqui</a> para ir para a página inicial.';
    }
);


// Rota teste de passagem de parâmetros
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

/* Testes com redirecionamento de rotas
// Route::get('/rota2', function(){ return redirect()->route('site.rota1'); })->name('site.rota2');
// Route::redirect('/rota2', '/rota1');

*/

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
