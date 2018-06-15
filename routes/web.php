<?php
//composer dump-autoload
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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController');
    Route::resource('posts', 'PostsController');
    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');

    Route::delete('permissions', 'PermissionsController@selectedDestroy')->name('permissions.selected.destroy');
    Route::delete('roles', 'RolesController@selectedDestroy')->name('roles.selected.destroy');

//    Route::group(['middleware' => ['permission:users__roles--update']], function () {
        Route::patch('users/{user}/roles/update', 'UsersController@rolesUpdate')->name('users.roles.update');
        Route::get('users/{user}/roles', 'UsersController@roles')->name('users.roles');
//    });
//    Route::group(['middleware' => ['permission:roles__permissions--update']], function () {
        Route::patch('roles/{role}/permissions/update', 'RolesController@permissionsUpdate')->name('roles.permissions.update');
        Route::get('roles/{role}/permissions', 'RolesController@permissions')->name('roles.permissions');
//    });

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
