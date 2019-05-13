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

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

//    Clientes

    Route::group(['prefix' => 'clientes'], function () {
        Route::get('index', [
            'as' => 'clientes.index',
            'uses' => 'ClientsController@index'
        ]);

        Route::get('create', [
            'as' => 'clientes.create',
            'uses' => 'ClientsController@create'
        ]);

        Route::post('store', [
            'as' => 'clientes.store',
            'uses' => 'ClientsController@store'
        ]);

        Route::group(['prefix' => '{id}'], function () {
            Route::get('edit', [
                'as' => 'clientes.edit',
                'uses' => 'ClientsController@edit'
            ]);

            Route::get('show', [
                'as' => 'clientes.show',
                'uses' => 'ClientsController@show'
            ]);

            Route::put('update', [
                'as' => 'clientes.update',
                'uses' => 'ClientsController@update'
            ]);

            Route::delete('destroy', [
                'as' => 'clientes.destroy',
                'uses' => 'ClientsController@destroy'
            ]);

        });
    });



//    Formularios
    Route::group(['prefix' => 'formularios'], function () {
        Route::get('index', [
            'as' => 'formularios.index',
            'uses' => 'FormsController@index'
        ]);

        Route::get('create', [
            'as' => 'formularios.create',
            'uses' => 'FormsController@create'
        ]);

        Route::post('store', [
            'as' => 'formularios.store',
            'uses' => 'FormsController@store'
        ]);

        Route::group(['prefix' => '{id}'], function () {
            Route::get('edit', [
                'as' => 'formularios.edit',
                'uses' => 'FormsController@edit'
            ]);
            
            Route::get('show', [
                'as' => 'formularios.show',
                'uses' => 'FormsController@show'
            ]);
            
            Route::put('update', [
                'as' => 'formularios.update',
                'uses' => 'FormsController@update'
            ]);
            
            Route::delete('destroy', [
                'as' => 'formularios.destroy',
                'uses' => 'FormsController@destroy'
            ]);

        });
    });

    Route::group(['prefix' => 'ajax'], function () {
        Route::get('searchClient', 'AjaxController@searchClient');
    });

});

