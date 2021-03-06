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

// Route::get('/', function () {
//     return view('welcome');
// });
//


Auth::routes();
Route::redirect('/register', '/login'); //Block register

Route::group([
    'as' => 'admin.',
    'middleware' => 'auth',
    'namespace' => 'Admin',
    'prefix' => 'admin'], function() {

        // Dashboard
        Route::get('/', 'DashboardController@index')->name('dashboard');

//      Pages
        Route::get('/pages/{type}', 'PagesController@index');
        Route::get('/pages', 'PagesController@index');
        Route::get('/pages/create/{type}', ['as' => 'pages.create', 'uses' => 'PagesController@create']);
        Route::post('/pages/store', ['as' => 'pages.store', 'uses' => 'PagesController@store']);
        Route::get('/pages/{id}/edit', ['as' => 'pages.edit', 'uses' => 'PagesController@edit']);
        Route::put('/pages/{id}', ['as' => 'pages.update', 'uses' => 'PagesController@update']);
        Route::get('/pages/{id}/delete', ['as' => 'pages.delete', 'uses' => 'PagesController@delete']);
        // Route::resource('/pages', 'PagesController');

//      Categories
        Route::resource('/categories', 'CategoriesController');

//      Language
        Route::resource('/language', 'LanguageController');

//      Posts
        Route::resource('/posts', 'PostsController');

//      Posts
        Route::resource('/reviews', 'ReviewsController');
        Route::put('reviews/status/{id}', ['as' => 'reviews.status', 'uses' => 'ReviewsController@status']);

//      Users
        Route::resource('/users', 'UsersController');

//      Roles
        Route::resource('/roles', 'RolesController');

//      Settings
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', 'SettingsController@edit')->name('edit');
            Route::put('/', 'SettingsController@update')->name('update');
        });

    });

Route::get('/{any}', function () {
    return view('spa');
})->where('any', '.*');