<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'auth'], function (){
    Route::post('login', 'UserController@login');
});

Route::group(['prefix'=>'loan', 'middleware' => 'permission'], function (){
    Route::post('create', 'LoanController@create')->name('user.create.loan');
    Route::get('{id}', 'LoanController@getLoanById')->name('user.getLoanById.loan');
    Route::put('repay/{id}', 'LoanController@repay')->name('user.repay.loan');
});

Route::group(['prefix'=>'admin', 'middleware' => 'permission'], function (){
    Route::put('loan/update/{id}', 'LoanController@update')->name('admin.update.loan');
});
