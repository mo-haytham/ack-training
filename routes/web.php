<?php

use App\Models\Acknowledgement;
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

Route::redirect('/', '/acknowledgement');

Route::namespace('App\Http\Controllers\Hse')->group(function () {
    Route::prefix('acknowledgement')->group(function () {
        Route::get('/', 'AcknowledgementController@index')->name('ack.index');
        Route::get('/create', 'AcknowledgementController@create')->name('ack.create');
        Route::post('/create', 'AcknowledgementController@save')->name('ack.save');
        Route::get('/view/{id}', 'AcknowledgementController@view')->name('ack.view');
        Route::get('/edit/{id}', 'AcknowledgementController@edit')->name('ack.edit');
        Route::post('/edit/{id}', 'AcknowledgementController@update')->name('ack.update');
        Route::post('/delete', 'AcknowledgementController@delete')->name('ack.delete');
    });
});
