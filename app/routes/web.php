<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\Rota1Controller;
use App\Http\Controllers\SobreNosController;
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
// Route::get('/contato/{nome}/{sobrenome_id}', function( string $nome, int $sobrenome_id ) {
//     echo "Contato - $nome $sobrenome_id";
// })->where('sobrenome_id', '[0-9]+')->where('nome', '[A-Za-z]+');

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function(){ return 'Login'; })->name('site.login');

Route::prefix('/app')->group(function () {
    Route::get('/clientes', function(){ return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores', function(){ return 'Fornecedores'; })->name('app.fornecedores');
    Route::get('/produto', function(){ return 'Produtos'; })->name('app.produtos');
});

Route::get('/rota1/{p1}/{p2}', [Rota1Controller::class, 'teste'])->name('site.rota1');

// Route::get('/rota2', function() {
//     echo 'Rota2';
//     return redirect()->route('site.rota1');
// })->name('site.rota2');

// Route::redirect('/rota2', '/rota1');

Route::fallback(function(){
    echo 'Rota acessada não existe!<a href="'.route('site.index').'">Cliquei aqui</a> para ir a pagina inicial';
});

