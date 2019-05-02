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


/*
 * Rotas padrões do pacote SGIAuthorizer para login e exibição dos usuários logados.
 */
Route::get(config('sgiauthorizer.app.loginRoute'), [
    'as' => 'login',
    'uses' => '\Uepg\SGIAuthorizer\Auth\Controllers\LoginController@getLogin'
]);
Route::post(config('sgiauthorizer.app.loginRoute'), 'Auth\LoginController@login');
Route::get('/logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
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
