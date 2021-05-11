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


	/* notifications -------------------------------------------------------- */

	Route::get('professeur/notifications','TeachersController@indexNotification')->name('messagesTeacher.index');

	Route::post('professeur/notifications-created','TeachersController@storeNotification')->name('messagesTeacher.store');
	
	Route::get('professeur/notifications/{notification}','TeachersController@destroyNotification')->name('notificationsTeacher.destroy');
	
	Route::get('professeur/messages-show','TeachersController@showNotification')->name('notificationsTeacher.show');

	Route::post('professeur/update/{notification}', 'TeachersController@updateNotification')->name('notificationsTeacher.update');


	/* notes etudiants */

	Route::get('/liste-classes','TeachersController@liste_classe')->name('teacher.classes.liste_classe');

	Route::get('/liste_étudiants/{assign_subject}','TeachersController@liste_student')->name('teacher.students.liste_student');

	Route::get('/classe/{classe}','TeachersController@classe')->name('teacher.classes.classe');

	Route::get('/information/étudiant/{student}','TeachersController@InfoStudent')->name('teacher.students.Infostudent');

	Route::get('/coéficent-bareme','TeachersController@coeff_bareme')->name('teacher.classes.coeff_bareme');
	
   //enregistrer une note 
   Route::post('enregistrement_note/{subject}','TeachersController@save_note')->name('teacher.students.save_note');
   
   //update une note 
	Route::post('modification_note/{mark}','TeachersController@update_note')->name('teacher.students.update_note');
	
	//supprimer une note 
	Route::get('supprimer_note/{mark}','TeachersController@delete_note')->name('teacher.students.delete_note');




	 /* TEACHERS -----------------------------------------------------------------------------------------*/
	 Route::get('professeurs', 'TeachersController@index')->name('teachers.index');
 
	 Route::get('/nouveau-prof', 'TeachersController@create')->name('teachers.create');
	 Route::post('/nouveau-prof', 'TeachersController@store')->name('teachers.store');
 
	 Route::get('/prof/{id}/modifier', 'TeachersController@edit')->name('teachers.edit');
	 Route::post('/prof/{id}/modifier', 'TeachersController@update')->name('teachers.update');
 
	 Route::get('/prof/{id}/supprimer', 'TeachersController@destroy')->name('teachers.destroy');

	 Route::get('/emploi_du temp','TeachersController@class_routine' )->name('teachers.c_r');
 
});



