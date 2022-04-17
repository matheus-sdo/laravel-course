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

Route::get('/', function () {
    // return view('welcome');
    return "Olá, seja bem-vindo ao curso, queridx!";
});

Route::get('/sobre-nos', function () {
    return "Somos nós!";
});

Route::get('/contato', function () {
    return "Entra em contato ai!";
});
