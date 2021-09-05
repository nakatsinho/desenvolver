<?php

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

use APDS\Models\Curso;

Route::get('/', function () {
    $cursos = Curso::orderBy('created_at','desc')->get();
    return view('welcome', compact('cursos'));
})->name('principal');

Auth::routes();

// Routes for Admin group
Route::group(['as'=>'admin.','prefix'=>'admin','middleware' => ['auth', 'admin']], // Checks if user is admin or not
    function(){
        // Admin dashboard
        Route::get('/', 'Admin\HomeController@index')->name('home');

        Route::resource('/perfil','Admin\PerfilController');

        Route::resource('/tutoria','Admin\TutorCursoController');

        Route::resource('/ficha','Admin\FichaApoioController');

        Route::resource('/estudante','Admin\EstudanteController');

        Route::resource('/cursos','Admin\CursoController');

    }
);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('facebook', function () {
    return view('facebookAuth');
});
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

Route::resource('/cursos','CursoController');

Route::resource('/modulos','ModuloController');

Route::resource('/teste','TestController');

Route::resource('/ficha','FichaApoioController');

Route::resource('/tutor','TutorController');

Route::resource('/reading','ReadController');

Route::resource('/pedidos','PedidoController');

Route::resource('/perfil','PerfilController');

Route::resource('/checkout','PagamentoController');

Route::resource('/resultados','ResultadoController');

Route::get('/pesquisa%curso', 'SearchController@getCurso')->name('pesquisa.curso');

Route::get('/termos%condicoes', 'PagesController@getTerms')->name('termos.index');

Route::resource('/chat','ChatController');

Route::post('/status/{statusId}/reply',[
    'uses' => '\APDS\Http\Controllers\ChatController@postReply',
    'as' => 'status.reply',
    'middleware' =>['auth'],
]); 

 /*** Rota para gostos/likes do usuario */

Route::get('/status/{statusId}/like', [
    'uses' => '\APDS\Http\Controllers\ChatController@getLike',
    'as' => 'status.like',
    'middleware' =>['auth'],
]); 