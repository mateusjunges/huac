<?php

use HUAC\Http\Controllers\HomeController;
use HUAC\Http\Controllers\Surgery\SurgeryController;

/*
 * Rotas padrões do pacote SGIAuthorizer para login e exibição dos usuários logados.
 */
include_once('sgi-authorizer/web.php');

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'sgi-auth'], function (){
   Route::get('/home', HomeController::class);

   Route::resource('surgeries', SurgeryController::class);
});
