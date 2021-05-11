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
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () 
{


	// route pour aller à la page d'edition d'un user 
	Route::get('/modifier-profil/{user_id}', 'UsersController@edit')->name('user.edit');

	// route pour modifier un user
	Route::post('/compte-update/{id} ', 'UsersController@update_user')->name('user.update');
	
	// route pour créer un user 
	Route::post('/create-user','UsersController@create')->name('create.user');
	
	
	//route pour activer/desactiver un compte
	Route::get('changeStatus','UsersController@changeStatus');
	
	
	Route::post('/photo-mise-a-jour{id}', 'UsersController@photo_user')->name('user.photo');

	// create user
	
	Route::get('/new-user', 'AdminController@create')->name('user.create');
	
	//book and book_issue
	
	Route::get('/livres-empruntes','AdminController@indexBook_issu')->name('book_issu.index');
	
	Route::get('/emprunt/{book_issu}','AdminController@book_issu_show')->name('book_issu.show');

	Route::get('/livres','AdminController@indexBook')->name('books.index');
	
	Route::get('/livre/{book}','AdminController@showBook')->name('books.show');
	
	
	Route::get('/create-book','BookController@create')->name('admin.book.create');
	
	Route::get('/show-book/{book}','BookController@show')->name('admin.book.show');

	Route::post('/store-book','BookController@store')->name('admin.book.store');

		// ajoutre une catégorie
		Route::post('catégorie','BookController@add_categorie')->name('admin.categorie.add');

		// liste des categories
		Route::get('catégories','BookController@index_categories')->name('admin.categories');
		
		// editer une categorie
		Route::post('catégories/modification/{categorie}','BookController@edit_categorie')->name('admin.categorie.update');
		
		
		// supprimer une categorie
		Route::get('catégories/{categorie}','BookController@delete_categorie')->name('admin.categorie.delete');
	

	/* LIBRIANS -----------------------------------------------*/
	
	Route::get('bibliothecaires', 'AdminController@indexLibrian')->name('librian.index');

	Route::get('/bibliothecaires/{librian}/show','AdminController@showLibrian')->name('librian.show');
	
	Route::get('/bibliothecaires/{librian}/supprimer', 'AdminController@destroyLibrian')->name('librian.destroy');

	
	/* Students-----------------------------------------------*/

	Route::get('liste/étudiants','AdminController@liste_students')->name('admin.students.liste');



	/* SUPERVISORS-----------------------------------------------*/


	Route::get('/responsables', 'AdminController@indexSupervisor')->name('supervisor.index');

	Route::get('/responsables/{supervisor}/show','AdminController@showSupervisor')->name('supervisor.show');

	Route::get('/responsables/{supervisor}/supprimer', 'AdminController@destroySupervisor')->name('supervisor.destroy');

	/* ACCOUNTANTS-----------------------------------------------*/


	Route::get('comptables', 'AdminController@indexAccountant')->name('accountant.index');

	Route::get('/comptables/{accountant}','AdminController@showAccountant')->name('accountant.show');

	Route::get('/comptables/{accountant}/supprimer', 'AdminController@destroyAccountant')->name('accountant.destroy');


	/* notifications -------------------------------------------------------- */

	Route::get('/notifications','MessageController@index')->name('messagesAdmin.index');
	
	Route::post('/messages/réponse/{notification}','AdminController@ResponseMessage')->name('messages.repondre');
	
	Route::post('/admin/notifications-created','MessageController@store')->name('messagesAdmin.store');
	
	Route::get('/admin/notifications/{notification}','MessageController@destroy')->name('notificationsAdmin.destroy');
	
	Route::post('/admin/notifications/delelte_all','MessageController@deleteAllNotification')->name('notificationAdmin.deleteAll');
	

	Route::get('/admin/messages-show','MessageController@show')->name('notificationsAdmin.show');

	Route::post('admin/update/{notification}', 'MessageController@updateNotification')->name('notificationAdmin.update');


	/* CLASSES --------------------------------------------------------------------------------------------*/

	Route::get('classes', 'ClassesController@index')->name('admin.classes.index');

	Route::get('classe/semestre/{classe}','AdminController@liste_Semestre')->name('admin.classes.liste_semestre');

	Route::get('classe/semestre/matiere/{semestre}','AdminController@liste_ue')->name('admin.classes.liste_ue_matiere');

	Route::get('classe/liste des étudiants/{classe}','AdminController@liste_student')->name('admin.classes.liste_student');

	Route::get('étudiant/{student}','AdminController@show_student')->name('admin.classes.show_student');

	Route::get('/nouvelle-classe', 'ClassesController@create')->name('admin.classes.create');

	Route::post('/nouvelle-classes', 'ClassesController@store')->name('admin.classes.store');

	Route::get('/modifie-classe/{id}', 'ClassesController@edit')->name('admin.classes.edit');

	Route::post('/update-classe/{id}', 'ClassesController@update')->name('admin.classes.update');

	Route::get('/delete-classe/{id}', 'ClassesController@destroy')->name('admin.classes.destroy');


	/*,Salle de classe */
	Route::get('/salles-de-classe', 'classroomController@index')->name('admin.classrooms.index');
	Route::get('/nouvelle-salle', 'classroomController@create')->name('admin.classrooms.create');
	Route::post('/nouvelle-sall', 'classroomController@store')->name('admin.classrooms.store');
	Route::get('/salle/{id}/modifier', 'classroomController@edit')->name('admin.classrooms.edit');
	Route::post('/salle/{id}/modifier', 'classroomController@update')->name('admin.classrooms.update');
	Route::get('/salle/{id}/suprrrimer', 'classroomController@delete')->name('admin.classrooms.delete');

	// liste parametres
	Route::get('parametres','SettingsController@index')->name('admin.settings.index');

	Route::post('/parametres', 'SettingsController@update')->name('admin.settings.update');
	Route::post('/parametres-logo', 'SettingsController@update_logo')->name('settings.update_logo');




	// academic_year
	Route::get('année_académique/','AdminController@academic_year')->name('academic_year');

	// activer l'année academique
	Route::get('année_académique/active/{academic_year}','AdminController@ay_Activate')->name('academic_year.activate');

	// ajouter une année académique
	Route::post('année_académique/ajout','AdminController@academic_save')->name('academic_year.add');

	// modifier un année academique
	Route::get('année_académique/modification/{academic_year}','AdminController@ay_update')->name('academic_year.update');

	
	Route::post('année_académique/modification/{academic_year}','AdminController@ay_updated')->name('academic_year.updated');

	// supprimer une année academique 
	Route::get('année_académique/suppression/{academic_year}','AdminController@delete_ay')->name('academic_year.delete');

	// liste dossier
	Route::get('dossier_etudiant/{student}','AdminController@List_dossier')->name('student.student_dossier');

	// dossier etudiant
	Route::get('liste_etudiant/','AdminController@Student_dossier')->name('student.liste_dossier');

	// bulletin etudiant
	Route::get('bulletin_etudiant/{student_file}','AdminController@bulletin_student')->name('student.bulletin_etudiant');
	
	

	// liste des professeur 
	Route::get('professeurs/','AdminController@List_teachers')->name('teacher.index');

	// detail professeur
	Route::get('/professeur/{teacher}/details', 'AdminController@showTeacher')->name('teacher.show');
	
	// emploi du temps professeur 
	Route::get('/professeur/{teacher}/emploie_du_temps', 'AdminController@classe_routineTeacher')->name('teacher.classe_routine');


		// liste des admissions 
	Route::get('responsable/admissions' ,'AdminController@liste_Admission')->name('supervisor.liste_admisssion');

	
	Route::get('liste_demandes', 'AdmissionRequestController@admission_request_liste')->name('admission_request.liste');

	
	Route::get('demande_admission/detail/{id}', 'AdmissionRequestController@detailDossier')->name('admission_requests.detail');
	
	Route::get('demande_admission/suppression/{id}', 'AdmissionRequestController@admission_request_delete')->name('admission_requests.destroy');



	/*-------------- gestion des contacts ----------------------*/


	//liste des contacts
	Route::get('admin/contacts' , 'AdminController@liste_Contact')->name('admin.contact.liste');
	
	Route::get('admin/contacts/{contact}' , 'AdminController@delete_Contact')->name('admin.contact.delete');

});