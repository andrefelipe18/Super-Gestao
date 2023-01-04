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

Route::get('/', 'App\Http\Controllers\PrincipalController@direcionamento')->name('site.index')->middleware('log.acesso'); // dando nome a rota

Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosController@principal')->name('site.sobrenos'); // Rota sobre-nos

Route::get('/contato', 'App\Http\Controllers\ContatoController@principal')->name('site.contato'); // Rota método get
Route::post('/contato', 'App\Http\Controllers\ContatoController@save')->name('site.contato'); // Rota método post


Route::get('/login/{erro?}', 'App\Http\Controllers\LoginController@index')->name('site.login'); // Rota login get
Route::post('/login', 'App\Http\Controllers\LoginController@autenticar')->name('site.login'); // Rota login post



//Criando um prfixo para agrupar
Route::middleware('log.acesso','autentificacao:padrao, visitantes')->prefix('/app')->group(function(){
    // Rota home
    Route::get('/home','App\Http\Controllers\HomeController@index')->name('app.home');
    // Rota sair
    Route::get('/sair','App\Http\Controllers\LoginController@sair')->name('app.sair');
    // Rota cliente
    // Rota fornecedores
    Route::get('/fornecedor', 'App\Http\Controllers\FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor', 'App\Http\Controllers\FornecedorController@listar')->name('app.fornecedor');


    Route::get('/fornecedor/listar', 'App\Http\Controllers\FornecedorController@listar')->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', 'App\Http\Controllers\FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');

    Route::get('/fornecedor/editar/{id}/{msg?}', 'App\Http\Controllers\FornecedorController@editar')->name('app.fornecedor.editar');
    Route::post('/fornecedor/editar/{id}', 'App\Http\Controllers\FornecedorController@editar')->name('app.fornecedor.editar');

    Route::get('/fornecedor/excluir/{id}', 'App\Http\Controllers\FornecedorController@excluir')->name('app.fornecedor.excluir');


    // Rota produtos
    Route::resource('produto', 'App\Http\Controllers\ProdutoController');

    // Rota produto detalhe
    Route::resource('produto-detalhe', 'App\Http\Controllers\ProdutoDetalheController');

    // Rota pedido
    Route::resource('pedido', 'App\Http\Controllers\PedidoController');
    //Rota cliente
    Route::resource('cliente', 'App\Http\Controllers\ClienteController');
    //Rota pedido-produto
   // Route::resource('pedido-produto', 'App\Http\Controllers\PedidoProdutoController');
    Route::get('pedido-produto/create/{pedido}', 'App\Http\Controllers\PedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', 'App\Http\Controllers\PedidoProdutoController@store')->name('pedido-produto.store');
}); // Rotas com prefixo app

Route::get( // Rota contato com parâmetros opcionais e não opcionais
    '/contato/{nome}/{categoria_id}',
    function(
        string $nome = 'Desconhecido',
        int $categoria_id = 1 )
        {
    echo "Nome: $nome <br>";
    echo "Categoria: $categoria_id <br>";
    }
)->where('categoria_id', '[0-9]+') // Restrição para o parâmetro categoria_id ser um número
->where('nome', '[A-Za-z]+'); // Restrição para o parâmetro nome ser uma string

Route::get('/index', function(){
    return redirect()->route('site.index'); // Redirecionando para a rota site.index
});

Route::get('/teste/{p1}/{p2}', 'App\Http\Controllers\TesteController@teste')->name('teste');

Route::fallback(function(){ // Rota fallback
    echo 'A rota acessada não existe';
    sleep(2);
    return redirect()->route('site.index');
});

