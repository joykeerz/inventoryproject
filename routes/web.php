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
    if (Auth::check()) {
        return redirect('home');
    }else {
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

///Products Route
Route::get('/products', 'ProductController@index')->name('mainProducts');
//banking
Route::get('/products/banking', 'ProductController@dataBankingList')->name('BankingProducts');
Route::get('/products/banking/add', 'ProductController@addBanking')->name('AddBanking');
Route::post('/products/banking/add', 'ProductController@createBanking')->name('CreateBanking');
Route::get('/products/banking/{id}/edit', 'ProductController@editBanking')->name('EditBanking');
Route::put('/products/banking/{id}/', 'ProductController@updateBanking')->name('UpdateBanking');
Route::delete('/products/banking/{id}', 'ProductController@deleteBanking')->name('DeleteBanking');
//electronic
Route::get('/products/electronic', 'ProductController@dataElectronicList')->name('ElectronicProducts');
Route::get('/products/electronic/add', 'ProductController@addElectronic')->name('AddElectronic');
Route::post('/products/electronic/add', 'ProductController@createElectronic')->name('CreateElectronic');
Route::delete('/products/electronic/{id}', 'ProductController@deleteElectronic')->name('DeleteElectronic');
///Spareparats Route
Route::get('/spareparts', 'SparepartController@index')->name('mainSparepart');
