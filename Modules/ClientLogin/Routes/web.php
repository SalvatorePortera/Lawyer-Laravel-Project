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

Route::middleware('permission','systemsubscription')->group(function (){
    Route::get('/settings', 'ClientLoginController@settings')->name('client.settings');
    Route::post('/settings', 'ClientLoginController@post_settings');
});
Route::middleware('client','systemsubscription')->group(function (){
    Route::get('/my_details', 'ClientController@my_dashboard')->name('client.my_dashboard');
    Route::get('/my_cases', 'ClientController@my_cases')->name('client.my_cases');
    Route::get('/my_closed_cases', 'ClientController@my_closed_cases')->name('client.my_closed_cases');
    Route::get('/my_waiting_cases', 'ClientController@my_waiting_cases')->name('client.my_waiting_cases');
    Route::get('/my_judgement_cases', 'ClientController@my_judgement_cases')->name('client.my_judgement_cases');
    Route::get('/my_cases/{id}', 'ClientController@my_cases_show')->name('client.case.show');
    Route::get('/my_profile', 'ClientController@my_profile')->name('client.my_profile');
    //Route::post('/my_profile', 'ClientController@post_my_profile');

    Route::post('/upload_my_file', 'ClientController@upload_my_file')->name('client.upload_my_file');
    Route::delete('/destroy_my_file/{id}', 'ClientController@destroy_my_file')->name('client.destroy_my_file');
    
});

