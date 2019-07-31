<?php

use HUAC\Http\Controllers\HomeController;

/*
 * Rotas padrões do pacote SGIAuthorizer para login e exibição dos usuários logados.
 */
Route::get(config('sgiauthorizer.app.loginRoute'), [
    'as' => 'login',
    'uses' => '\Uepg\SGIAuthorizer\Auth\Controllers\LoginController@getLogin'
]);
Route::post(config('sgiauthorizer.app.loginRoute'), 'HUAC\Http\Controllers\Auth\LoginController@login');
Route::get('/logout', [
    'as' => 'logout',
    'uses' => 'HUAC\Http\Controllers\Auth\LoginController@logout'
]);

Route::group(['middleware' => 'sgiauth'], function() {
    Route::any(config('sgiauthorizer.app.userInfoRoute'),
        [
            'uses' => '\Uepg\SGIAuthorizer\Auth\Controllers\DisplayUserInfoController@userInfo'
        ])->name('userinfo');
});

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'sgi-auth'], function (){
   Route::get('/home', HomeController::class);
});
