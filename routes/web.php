<?php


Route::prefix('/dashboard')->namespace('Dashboard')->group(function (){
    Route::get('/', 'DashboardController@index');
});

Route::prefix('/projeto')->namespace('Projeto')->group(function (){
    Route::get('/', 'ProjetoController@index')->name('index');
    Route::get('/datatable', 'ProjetoController@dataTable');
});

Auth::routes();

Route::prefix('auth')->group(function (){



});

