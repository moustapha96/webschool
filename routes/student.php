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
//TOUTES LES ROUTES QUI NECESSITENT ETRE CONNECTÉ SONT PLACEES ICI
Route::group(['middleware' => ['auth']], function () 
{

	/* TEACHERS -----------------------------------------------------------------------------------------*/

	Route::get('/students', 'StudentsController@index')->name('students.index');

	Route::get('/student/{id}/show','StudentsController@show')->name('students.show');

	Route::get('/new-student', 'StudentsController@create')->name('students.create');

	Route::post('/nouveau-student', 'StudentsController@store')->name('students.store');

	Route::get('/stu/{id}/modifier', 'StudentsController@edit')->name('students.edit');

	Route::post('/stu/{id}/modifier', 'StudentsController@update')->name('students.update');

	Route::get('/stu/{id}/supprimer', 'StudentsController@destroy')->name('students.destroy');

	/* notifications -------------------------------------------------------- */

	Route::get('student/notifications','StudentsController@indexNotification')->name('messagesStudent.index');

	Route::post('student/notifications-created','StudentsController@storeNotification')->name('messagesStudent.store');
	
	Route::get('student/notifications/{notification}','StudentsController@destroyNotification')->name('notificationsStudent.destroy');
	
	Route::get('student/messages-show','StudentsController@showNotification')->name('notificationsStudent.show');

	Route::post('student/update/{notification}', 'StudentsController@updateNotification')->name('notificationsStudent.update');


	// les notes 
	Route::get('notes_étudiant','StudentsController@Notes')->name('student.note');

	// maquette
	Route::get('/maquette_étudiant','StudentsController@maquette')->name('student.maquette');
	
	// reclamation
	Route::get('/réclamation_étudiant','StudentsController@indexReclamation')->name('student.reclamation');
	
	// reclamation
	Route::get('/réclamation_étudiant/{id}','StudentsController@deleteReclamation')->name('student.deletereclamation');
	
	// 	add reclamations
	Route::post('/réclamation_étudiant/ajout','StudentsController@addReclamation')->name('student.addreclamation');
	
	// 	emploi du temps etudiant
	Route::get('étudiant_emploi_du_temps/','StudentsController@class_routine_student')->name('student.class_routine_student');
	

});
