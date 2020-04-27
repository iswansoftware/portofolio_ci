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
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {

    //* Dashboard
    Route::get('/', 'DashboardController@index')
        ->name('dashboard.index');

    //* Portofolio
    Route::get('/portofolios', 'PortofolioController@index')
        ->name('dashboard.portofolio.index');
    Route::get('/portofolio/create', 'PortofolioController@create')
        ->name('dashboard.portofolio.create');
    Route::post('/portofolio/store', 'PortofolioController@store')
        ->name('dashboard.portofolio.store');
    Route::post('/portofolio/choose', 'PortofolioController@choose')
        ->name('dashboard.portofolio.choose');
    Route::get('/portofolio/{id}/edit', 'PortofolioController@edit')
        ->name('dashboard.portofolio.edit');
    Route::post('/portofolio/update/{id}', 'PortofolioController@update')
        ->name('dashboard.portofolio.update');
    Route::post('/portofolio/destroy/{id}', 'PortofolioController@destroy')
        ->name('dashboard.portofolio.destroy');

    //* Option
    Route::get('/options', 'OptionController@index')
        ->name('dashboard.option.index');
    Route::post('/option/update/{id}/greeting', 'OptionController@greeting')
        ->name('dashboard.greeting.update');
    Route::post('/option/update/{id}/skill', 'OptionController@skill')
        ->name('dashboard.skill.update');
    Route::post('/option/update/{id}/aboutme', 'OptionController@aboutMe')
        ->name('dashboard.aboutme.update');
    Route::post('/option/update/{id}/location', 'OptionController@location')
        ->name('dashboard.location.update');
    Route::post('/option/update/{id}/motivation', 'OptionController@motivation')
        ->name('dashboard.motivation.update');

    //* Message
    Route::get('/messages', 'MessageController@index')
        ->name('dashboard.message.index');
    Route::post('/messages/destroy/{id}', 'MessageController@destroy')
        ->name('dashboard.message.destroy');

    //*  Account
    Route::get('/account/setting', 'UserController@setting')
        ->name('dashboard.account.setting');
    Route::get('/account/skill/store', 'UserController@setting')
        ->name('dashboard.skill.store');
    Route::post('/account/update', 'UserController@update')
        ->name('dashboard.account.update');
    Route::post('/account/update-password', 'UserController@updatePassword')
        ->name('dashboard.account.update.password');
});

//* Landing Page
Route::get('/', 'OptionController@content');

//* Store New Message
Route::post('/store', 'MessageController@store')
    ->name('message.store');

Auth::routes(['register' => false]);

// * Dev Tools
Route::get('decompose', '\Lubusin\Decomposer\Controllers\DecomposerController@index');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
