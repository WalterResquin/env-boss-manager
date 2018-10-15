<?php

Auth::routes();

Route::get('/', function (){return redirect('/dashboard');});
Route::get('/home', function (){return redirect('/dashboard');});


Route::middleware('auth')->group(function (){

    Route::prefix('/dashboard')->namespace('Dashboard')->group(function (){
        Route::get('/', 'DashboardController@index');
    });

    Route::prefix('/projetos')->as('projetos.')->namespace('Projeto')->group(function (){
        Route::get('/', 'ProjetoController@index')->name('index');
        Route::get('/datatable', 'ProjetoController@dataTable');
        Route::get('/novo', 'ProjetoController@novo')->name('novo');
        Route::get('/editar/{id}', 'ProjetoController@edtar')->name('editar');
        Route::post('/salvar', 'ProjetoController@salvar')->name('salvar');
        Route::post('/deletar', 'ProjetoController@deletar')->name('deletar');
    });

    Route::prefix('/anotacoes')->as('anotacoes.')->namespace('Anotacao')->group(function (){
        Route::get('/', 'AnotacaoController@index')->name('index');
        Route::get('/datatable', 'AnotacaoController@dataTable');
        Route::get('/novo', 'AnotacaoController@novo')->name('novo');
        Route::get('/editar/{id}', 'AnotacaoController@edtar')->name('editar');
        Route::post('/salvar', 'AnotacaoController@salvar')->name('salvar');
        Route::post('/deletar', 'AnotacaoController@deletar')->name('deletar');
        Route::get('/download/{id}', 'AnotacaoController@download')->name('download');
    });

    Route::prefix('/configuracoes')->as('configuracoes.')->namespace('Configuracao')->group(function (){
        Route::get('/', 'ConfiguracoesController@index')->name('index');
        Route::get('/datatable', 'ConfiguracoesController@dataTable');
        Route::get('/novo', 'ConfiguracoesController@novo')->name('novo');
        Route::get('/editar/{id}', 'ConfiguracoesController@edtar')->name('editar');
        Route::post('/salvar', 'ConfiguracoesController@salvar')->name('salvar');
        Route::post('/deletar', 'ConfiguracoesController@deletar')->name('deletar');
        Route::get('/download/{id}', 'ConfiguracoesController@download')->name('download.anexo');
        Route::get('/anexo/deletar', 'ConfiguracoesController@deletarAnexo')->name('anexo.deletar');
    });
});

