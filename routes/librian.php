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
	
	Route::get('/books','BookController@index')->name('librian.book.index');

	Route::get('/create-book','BookController@create')->name('librian.book.create');
	
	Route::get('/show-book/{book}','BookController@show')->name('librian.book.show');

	Route::post('/store-book','BookController@store')->name('librian.book.store');

	Route::post('/update-book/{book}','BookController@update')->name('librian.book.update');
	
	Route::get('/supprimer-livre/{id}','BookController@destroy')->name('librian.book.destroy');

	Route::get('/edit-book/{id}','BookController@edit')->name('librian.book.edit');
	
	// liste livre emprunté
	Route::get('livres-empruntés','BookController@indexBook_issu')->name('librian.index_book_issue');
	
	// emprunter un livre
	Route::get('nouveau-emrpunté','BookController@indexBook_issu')->name('librian.book.emprunter');
	
	
	// ajoutre une catégorie
	Route::post('catégorie','BookController@add_categorie')->name('librian.categorie.add');

	// liste des categories
	Route::get('catégories','BookController@index_categories')->name('librian.categories');
	
	// editer une categorie
	Route::post('catégories/modification/{categorie}','BookController@edit_categorie')->name('librian.categorie.update');
	
	
	// supprimer une categorie
	Route::get('catégories/{categorie}','BookController@delete_categorie')->name('librian.categorie.delete');


	// liste des emprunts
	Route::get('bibliothécaire/books_issues','BookController@indexBook_issu')->name('librian.book_issu.index');
	
	// afficher un emprunt
	Route::get('bibliothécaire/show-book_issu/{book_issu}','BookController@book_issu_show')->name('librian.book_issu.show');
	
	// editer un emprunt
	Route::get('bibliothécaire/modification/livre/{book_issu}','BookController@book_issu_edit')->name('librian.book_issu.edit');
	
	// supprimer un emprunt
	Route::get('bibliothécaire/suppréssion/{book_issu}','BookController@book_issu_destroy')->name('librian.book_issu.destroy');
   
	// ajouter un emprunt
	Route::get('bibliothécaire/nouveau-emprunt/','BookController@book_issu_new')->name('librian.book_issu.new');

	// enregistrer un emprunt
	Route::post('bibliothécaire/nouveau-emprunt/','BookController@book_issu_save')->name('librian.book_issu.save');
	
	// rendre un livre
	Route::get('bibliothécaire/rendre-livre/{book_issu}','BookController@book_issu_return')->name('librian.book_issu.return');

	// mettre a jour un emprunt
	Route::post('bibliothécaire/mise-à-jour/{book_issu}','BookController@book_issu_update')->name('librian.book_issu.update');

   



	/* notifications -------------------------------------------------------- */

	Route::get('librian/notifications','LibriansController@indexNotification')->name('messagesLibrian.index');

	Route::post('librian/notifications-envoyé','LibriansController@storeNotification')->name('messagesLibrian.store');
	
	Route::get('librian/notifications/{notification}','LibriansController@destroyNotification')->name('notificationsLibrian.destroy');
	
	Route::get('librian/messages-show','LibriansController@showNotification')->name('notificationsLibrian.show');

	Route::post('librian/update/{notification}', 'LibriansController@updateNotification')->name('notificationsLibrian.update');




});

