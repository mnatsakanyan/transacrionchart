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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/register', function () {
    return redirect("/login");
});
//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::get('/', 'DashBoardController@index')->name('dashboard.index');
    Route::resource('charts', 'ChartController');
    Route::get('charts-data', 'ChartController@data')->name("charts.data");

    Route::resource('transactions', 'TransactionController');
    Route::get('transactions-data', 'TransactionController@data')->name("transactions.data");
    Route::get('charts/data/{id}', 'ChartDataController@index')->name("chart.data");
});