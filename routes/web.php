<?php

use Illuminate\Support\Facades\Route;
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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', 'App\Http\Controllers\FrontendController@main')->name('home');
Route::get('/','App\Http\Controllers\FrontendController@main')->name('main');
Route::get('/blog', 'App\Http\Controllers\FrontendController@blog')->name('blog');
Route::get('/blog/{category}', 'App\Http\Controllers\FrontendController@category')->name('category');
Route::get('/post/{slug}', 'App\Http\Controllers\FrontendController@post')->name('single');
Route::get('/portfolio', 'App\Http\Controllers\FrontendController@portfolio')->name('portfolio');
Route::get('/portfolio/{slug}', 'App\Http\Controllers\FrontendController@portfolio_single')->name('portfolio.single');

Route::post('/', 'App\Http\Controllers\FrontendController@send_message')->name('contact');

// Admin panel
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {

    Route::group(['middleware' => ['role:admin']], function () {

        Route::get('/dashboard', 'App\Http\Controllers\FrontendController@dashboard')->name('admin.dashboard.index');

        Route::resource('category','App\Http\Controllers\CategoryController');
        Route::resource('post','App\Http\Controllers\PostController');
        Route::resource('user', 'App\Http\Controllers\UserController');
        Route::resource('faq', 'App\Http\Controllers\FaqController');
        Route::resource('portfolio', 'App\Http\Controllers\PortfolioPostController');

        Route::get('setting', 'App\Http\Controllers\SettingController@edit')->name('setting.index');
        Route::post('setting', 'App\Http\Controllers\SettingController@update')->name('setting.update');

        Route::get('/profile', 'App\Http\Controllers\UserController@profile')->name('user.profile');
        Route::post('/profile', 'App\Http\Controllers\UserController@profile_update')->name('user.profile.update');

        Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact.index');
        Route::delete('/contact/delete/{id}', 'App\Http\Controllers\ContactController@destroy')->name('contact.destroy');
        Route::get('/contact/show/{id}', 'App\Http\Controllers\ContactController@show')->name('contact.show');

//        Route::get('/faq', 'App\Http\Controllers\FaqController@index')->name('faq.index');
//        Route::delete('/faq/delete/{id}', 'App\Http\Controllers\FaqController@destroy')->name('faq.destroy');
//        Route::get('/faq/show/{id}', 'App\Http\Controllers\FaqController@show')->name('faq.show');
    });

});

