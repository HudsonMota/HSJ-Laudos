<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Tester\TesterTrait;

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

Auth::routes();

// ROTAS PARA A CONTROLLER HOME - METODO INDEX
Route::group(['middleware' => ['auth', 'noRolesAssigned']], function () {
    Route::get('/', 'HomeController@index')->name('home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/accessdenied', 'AccessDeniedController@index')->name('accessdenied.add');

// ROTAS PARA DESLOGAR E ENVIAR PARA VIEW DE LOGIN
Route::get('/logout', 'Auth\LoginController@logout');


//================================== Middleware acesso somente para ADM e SUPER ADM ==================================//
Route::group(['middleware' => ['auth', 'superAdm']], function () {
    //================================== ROTAS PARA USUÁRIO ==================================//
    // ROTAS PARA LISTAR USUÁRIO
    Route::get('/users', function () {
        return redirect()->route('users');
    });
    Route::get('/users', 'UpdateUserController@list_users')->name('users');

    // ROTAS PARA EDITAR USUÁRIO
    Route::get('/user/edit/{id}', 'UpdateUserController@get_edit_user')->name('user.edit');
    Route::post('/user/edit/{id}', 'UpdateUserController@post_edit_user')->name('user.postEdit');
    // ROTAS PARA DELETAR VEICULO
    Route::get('/user/delete/{id}', 'UpdateUserController@delete_user')->name('user.delete');

    //================================== ROTAS PARA PAPEL ==================================//
    // ROTAS PARA ADICIONAR PAPEL

    Route::get('/roleuser/add', 'RoleUserController@get_add_role_user')->name('roleuser.add');
    Route::post('/roleuser/add', 'RoleUserController@post_add_role_user')->name('roleuser.postAdd');

    // ROTAS PARA LISTAR PAPEL
    Route::get('/roleuser', function () {
        return redirect()->route('roleusers');
    });
    Route::post('/roleuser', 'RoleUserController@post_list_role_user')->name('roleuser.list');
    Route::get('/roleusers', 'RoleUserController@list_role_users')->name('roleusers');

    // ROTAS PARA EDITAR PAPEL
    Route::get('/roleuser/edit/{id}', 'RoleUserController@get_edit_role_use')->name('roleuser.edit');
    Route::post('/roleuser/edit/{id}', 'RoleUserController@post_edit_role_use')->name('roleuser.postEdit');

    // ROTAS PARA DELETAR PAPEL
    Route::get('/roleuser/delete/{id}', 'RoleUserController@delete_role')->name('roleuser.delete');
});



Route::group(['middleware' => ['auth', 'userRequest']], function () {
    //================================== ROTAS PARA Solicitação ==================================//
    // ROTAS PARA ADICIONAR Solicitação
    Route::get('/solicitacao-add', 'SolicitacaoController@viewRequestAdd')->name('solicitacao.add'); // Rota da view
    Route::post('/solicitacao-add', 'SolicitacaoController@store')->name('solicitacao.postAdd'); // Rota do formulário

    // ROTAS PARA LISTAR Solicitação
    Route::get('/solicitacao', function () {
        return redirect()->route('solicitacoes');
    });
    Route::post('/solicitacao', 'SolicitacaoController@post_list_solicitacao')->name('solicitacao.list');
    Route::get('/solicitacoes', 'SolicitacaoController@list_solicitacoes')->name('solicitacoes');
    Route::get('/solicitacao-pendentes', 'SolicitacaoController@your_pending_requests')->name('solicitacoes.pendentes');
    Route::get('/solicitacao-realizadas', 'SolicitacaoController@your_trips_made')->name('solicitacoes.realizadas');

    //ROTAS PARA EDITAR Solicitação
    Route::get('/solicitacao-edit/{id}', 'SolicitacaoController@get_edit_solicitacao')->name('solicitacao.edit');
    Route::post('/solicitacao-edit/{id}', 'SolicitacaoController@post_edit_solicitacao')->name('solicitacao.postEdit');

    //ROTAS PARA DELETAR Solicitação
    Route::get('/solicitacao/delete/{id}', 'SolicitacaoController@delete_solicitacao')->name('solicitacao.delete');
});


// ROTAS PARA VISUALIZAR PDF
Route::get('/request-report-pdf/{id}', 'PdfController@gerarPdf');
