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

Route::namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
//    ->middleware('auth')
    ->group(function () {
        // Dashboard
        Route::get('/', 'DashboardController@index')->name('dashboard');

//         Pages
        Route::resource('/pages', 'PagesController');

//         Categories
        Route::resource('/categories', 'CategoriesController');

//         Language
        Route::resource('/language', 'LanguageController');

//         Posts
        Route::resource('/posts', 'PostsController');

//         Users
        Route::resource('/users', 'UsersController')
            ->middleware(AdminPermission::class);

//         Settings
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', 'SettingsController@edit')->name('edit');
            Route::put('/', 'SettingsController@update')->name('update');
        });

        // Advertisement
//        Route::resource('/advertisement', 'AdvertisementController')
//            ->middleware(AdminPermission::class);
    });

Route::get('/{any}', function () {
    return view('spa');
})->where('any', '.*');