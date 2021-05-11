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

		GET /parents, mappé à la index()méthode,
		GET /parents/create, mappé à la create()méthode,
		POST /parents, mappé à la store()méthode,
		GET /parents/{contact}, mappé à la show()méthode,
		GET /parents/{contact}/edit, mappé à la edit()méthode,
		PUT / PATCH /parents/{parents}, mappé à la update()méthode,
		DELETE /parents/{parents}, mappé à la destroy()méthode.
|
*/


//TOUTES LES ROUTES QUI NECESSITENT ETRE CONNECTÉ SONT PLACEES ICI
Route::group(['middleware' => ['auth']], function () 
{

	#.....Route::resource('parents', 'ParentsController');

	/* notifications -------------------------------------------------------- */

	Route::get('parent/notifications','ParentController@indexNotification')->name('messagesParent.index');

	Route::post('parent/notifications-created','ParentController@storeNotification')->name('messagesParent.store');
	
	Route::get('parent/notifications/{notification}','ParentController@destroyNotification')->name('notificationsParent.destroy');
	
	Route::get('parent/messages-show','ParentController@showNotification')->name('notificationsParent.show');

	Route::post('parent/update/{notification}', 'ParentController@updateNotification')->name('notificationsParent.update');


	// liste des students
	Route::get('parent/étudiant','ParentController@list_student')->name('parent.students');

	// note etudiant
	Route::get('parent/étudiant/{student}','ParentController@note_student')->name('parent.student');

	// demande admission
	Route::get('parent/demande_admission','ParentController@DemandeAdmission')->name('parent.demande_admission');
	
	// note etudiant
	Route::post("envoie demande d'admission/parent",'ParentController@SendDemandeAdmission')->name('parent.send_demande_admission');
    
});
