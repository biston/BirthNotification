<?php

use App\Employe;

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


Auth::routes();

Route::redirect('/', '/home');
Route::group(['middleware'=>'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/employes/search',function(){
        return redirect()->route('employes.index');
    });

    Route::resource('employes', 'EmployeController');
    Route::post('/employes/search' ,'EmployeController@search')->name('employes.search');

    Route::get('/employes/notify/{employe}' , 'EmployeController@sendBirthDayEmail')->name('employes.notify');


    Route::get('/historiques/search',function(){
        return redirect()->route('historiques.index');
    });

    Route::get('/historiques' , 'HistoriqueController@index')->name('historiques.index');
    Route::delete('/historiques/{historique}' , 'HistoriqueController@destroy')->name('historiques.destroy');
    Route::post('/historiques/search' ,'HistoriqueController@search')->name('historiques.search');
});
