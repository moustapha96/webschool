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


//TOUTES LES ROUTES QUI NECESSITENT ETRE CONNECTÉ SONT PLACEES ICI
Route::group(['middleware' => ['auth']], function ()
{

	// Route::resource('accountant', 'AccountantsController');

	/* notifications -------------------------------------------------------- */

	Route::get('accountant/notifications','AccountantsController@indexNotification')->name('messagesAccountant.index');

	Route::get('accountant/notifications-create','AccountantsController@createNotification')->name('messagesAccountant.create');

	Route::post('accountant/notifications-created','AccountantsController@storeNotification')->name('messagesAccountant.store');

	Route::get('accountant/notifications/{notification}','AccountantsController@destroyNotification')->name('notificationsAccountant.destroy');

	Route::get('accountant/messages-show','AccountantsController@showNotification')->name('notificationsAccountant.show');

	Route::post('accountant/update/{notification}', 'AccountantsController@updateNotification')->name('notificationsAccountant.update');
});
