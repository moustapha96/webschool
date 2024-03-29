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
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {


	// route pour aller à la page d'edition d'un user
	Route::get('/modifier-profil/{user_id}', 'UsersController@edit')->name('user.edit');

	// route pour modifier un user
	Route::post('/compte-update/{id} ', 'UsersController@update_user')->name('user.update');

	// route pour créer un user
	Route::get('/create-user', 'UsersController@create')->name('admin.user.create');

	Route::post('users/cretated', 'UsersController@store')->name('admin.user.store');
	//tout les user
	Route::get('/users', 'UsersController@index')->name('user.index');

	Route::get('/users', 'UsersController@index')->name('admin.user.index');


	//route pour activer/desactiver un compte
	Route::get('changeStatus', 'UsersController@changeStatus');


	Route::post('/photo-mise-a-jour{id}', 'UsersController@photo_user')->name('user.photo');

	// create user

	Route::get('/new-user', 'AdminController@create')->name('user.create');

	//book and book_issue

	// Route::get('/livres-empruntes', 'AdminController@indexBook_issu')->name('book_issu.index');

	// Route::get('/emprunt/{book_issu}', 'AdminController@book_issu_show')->name('book_issu.show');

	Route::get('/livres', 'AdminController@indexBook')->name('books.index');

	Route::get('/livre/{book}', 'AdminController@showBook')->name('books.show');


	Route::get('/create-book', 'BookController@create')->name('admin.book.create');

	Route::get('/show-book/{book}', 'BookController@show')->name('admin.book.show');

	Route::post('/store-book', 'BookController@store')->name('admin.book.store');

	/**
	 * gestion des niveaux
	 **/
	// ajoutre une catégorie
	Route::post('niveaux', 'NiveauController@store')->name('admin.niveau.add');

	// liste des categories
	Route::get('niveaux', 'NiveauController@index')->name('admin.niveau');

	// editer une categorie
	Route::post('niveaux/modification/{niveau}', 'NiveauController@update')->name('admin.niveau.update');



	// supprimer une categorie
	Route::get('niveaux/{niveau}', 'NiveauController@destroy')->name('admin.niveau.delete');


	/**
	 * gestion des filieres
	 **/
	// ajoutre une catégorie
	Route::post('filieres', 'FiliereController@store')->name('admin.filiere.add');

	// liste des categories
	Route::get('filieres', 'FiliereController@index')->name('admin.filiere');

	// editer une categorie
	Route::post('filieres/modification/{filiere}', 'FiliereController@update')->name('admin.filiere.update');



	// supprimer une categorie
	Route::get('filieres/{filiere}', 'FiliereController@destroy')->name('admin.filiere.delete');


	/**
	 * gestion des categories de livre
	 **/
	// ajoutre une catégorie
	Route::post('/catégorie', 'BookController@add_categorie')->name('admin.categorie.add');

	// liste des categories
	Route::get('/catégories', 'BookController@index_categories')->name('admin.categories');

	// editer une categorie
	Route::post('/catégories/modification/{categorie}', 'BookController@edit_categorie')->name('admin.categorie.update');


	// creer une classe
	Route::post('/classe/création', 'ClassesController@store')->name('admin.classe.store');

	Route::post('classe/{classe}/update', 'ClassesController@update')->name('admin.classe.update');
	// supprimer une categorie
	Route::get('catégories/{categorie}', 'BookController@delete_categorie')->name('admin.categorie.delete');


	/* LIBRIANS -----------------------------------------------*/

	Route::get('bibliothecaires', 'AdminController@indexLibrian')->name('librian.index');

	Route::get('/bibliothecaires/{librian}/show', 'AdminController@showLibrian')->name('librian.show');

	Route::get('/bibliothecaires/{librian}/supprimer', 'AdminController@destroyLibrian')->name('librian.destroy');


	/* Students-----------------------------------------------*/

	Route::get('liste/étudiants', 'AdminController@liste_students')->name('admin.students.liste');



	/* SUPERVISORS-----------------------------------------------*/


	Route::get('/responsables', 'AdminController@indexSupervisor')->name('supervisor.index');

	Route::get('/responsables/{supervisor}/show', 'AdminController@showSupervisor')->name('supervisor.show');

	Route::get('/responsables/{supervisor}/supprimer', 'AdminController@destroySupervisor')->name('supervisor.destroy');

	/* ACCOUNTANTS-----------------------------------------------*/


	Route::get('comptables', 'AdminController@indexAccountant')->name('accountant.index');

	Route::get('/comptables/{accountant}', 'AdminController@showAccountant')->name('accountant.show');

	Route::get('/comptables/{accountant}/supprimer', 'AdminController@destroyAccountant')->name('accountant.destroy');


	/* notifications -------------------------------------------------------- */

	Route::get('/notifications', 'MessageController@index')->name('messagesAdmin.index');

	Route::post('/messages/réponse/{notification}', 'AdminController@ResponseMessage')->name('messages.repondre');

	Route::post('/admin/notifications-created', 'MessageController@store')->name('messagesAdmin.store');

	Route::get('/admin/notifications/{notification}', 'MessageController@destroy')->name('notificationsAdmin.destroy');

	Route::post('/admin/notifications/delelte_all', 'MessageController@deleteAllNotification')->name('notificationAdmin.deleteAll');


	Route::get('/admin/messages-show', 'MessageController@show')->name('notificationsAdmin.show');

	Route::post('admin/update/{notification}', 'MessageController@updateNotification')->name('notificationAdmin.update');


	/* CLASSES --------------------------------------------------------------------------------------------*/

	Route::get('classes', 'ClassesController@index')->name('admin.classes.index');

	// liste des semestre d'une classe

	Route::get('classe/semestres/{classe}', 'SemesterController@ClasseSemester')->name('admin.classe.semester');

	Route::get('semestres/ue/{semestre}', 'SemesterController@SemesterUnitie')->name('admin.semester.unitie');




	Route::get('classe/semestre/{classe}', 'AdminController@liste_Semestre')->name('admin.classes.liste_semestre');

	Route::get('classe/semestre/matiere/{semestre}', 'AdminController@liste_ue')->name('admin.classes.liste_ue_matiere');

	// liste des étudiants d'une classe
	Route::get('classe/liste des étudiants/{classe}', 'ClassesController@ClasseStudent')->name('admin.classes.liste_student');


	Route::get('étudiant/{student}', 'AdminController@show_student')->name('admin.classes.show_student');

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
	Route::get('parametres', 'SettingsController@index')->name('admin.settings.index');

	Route::post('/parametres', 'SettingsController@update')->name('admin.settings.update');
	Route::post('/parametres-logo', 'SettingsController@update_logo')->name('settings.update_logo');




	// academic_year
	Route::get('année_académique/', 'AdminController@academic_year')->name('academic_year');

	// activer l'année academique
	Route::get('année_académique/active/{academic_year}', 'AdminController@ay_Activate')->name('academic_year.activate');

	// ajouter une année académique
	Route::post('année_académique/ajout', 'AdminController@academic_save')->name('academic_year.add');

	// modifier un année academique
	Route::get('année_académique/modification/{academic_year}', 'AdminController@ay_update')->name('academic_year.update');


	Route::post('année_académique/modification/{academic_year}', 'AdminController@ay_updated')->name('academic_year.updated');

	// supprimer une année academique
	Route::get('année_académique/suppression/{academic_year}', 'AdminController@delete_ay')->name('academic_year.delete');

	// liste dossier
	Route::get('dossier_etudiant/{student}', 'AdminController@List_dossier')->name('student.student_dossier');

	// dossier etudiant
	Route::get('liste_etudiant/', 'AdminController@Student_dossier')->name('student.liste_dossier');

	// bulletin etudiant
	Route::get('bulletin_etudiant/{student_file}', 'AdminController@bulletin_student')->name('student.bulletin_etudiant');



	// liste des professeur
	Route::get('professeurs/', 'AdminController@List_teachers')->name('teacher.index');

	// detail professeur
	Route::get('/professeur/{teacher}/details', 'AdminController@showTeacher')->name('teacher.show');

	// emploi du temps professeur
	Route::get('/professeur/{teacher}/emploie_du_temps', 'AdminController@classe_routineTeacher')->name('teacher.classe_routine');


	// liste des admissions
	// Route::get('responsable/admissions', 'AdminController@liste_Admission')->name('supervisor.liste_admisssion');


	// Route::get('liste_demandes', 'AdmissionRequestController@admission_request_liste')->name('admission_request.liste');


	// Route::get('demande_admission/detail/{id}', 'AdmissionRequestController@detailDossier')->name('admission_requests.detail');


	//liste des demande d'admission
	Route::get('demande d\'admission/detail/{admission_request}', 'AdmissionRequestController@show')->name('admin.admission_requests.show');

	Route::get('demande d\'admission/liste', 'AdmissionRequestController@index')->name('admin.admission_requests.index');

	Route::get('demande_admission/suppression/{admission_request}', 'AdmissionRequestController@destroy')->name('admin.admission_requests.destroy');



	/*-------------- gestion des contacts ----------------------*/


	//liste des contacts
	Route::get('admin/contacts', 'AdminController@liste_Contact')->name('admin.contact.liste');

	Route::get('admin/contacts/{contact}', 'AdminController@delete_Contact')->name('admin.contact.delete');



	/* Matiere = cours -----------------------------------------------------------------------------------------*/

	Route::get('/matiere', 'SubjectController@index')->name('admin.subject.index');

	Route::get('/gestion des matieres', 'SubjectController@index_gestion')->name('admin.subject.index_gestion');

	Route::get('/nouvelleMatiere', 'SubjectController@create')->name('admin.subject.create');

	Route::post('/nouvelleMatiere', 'SubjectController@store')->name('admin.subject.store');

	Route::get('/matiere/{subject}/modifier', 'SubjectController@edit')->name('admin.subject.edit');

	Route::post('/matiere/{subject}/modifier', 'SubjectController@update')->name('admin.subject.update');

	Route::get('/matiere/{subject}/suprimer', 'SubjectController@destroy')->name('admin.subject.destroy');


	/* Semestre -----------------------------------------------------------------------------------------*/


	Route::get('/semestre', 'SemesterController@index')->name('admin.semester.index');

	Route::get('/nouvelleSemestre', 'SemesterController@create')->name('admin.semester.create');

	Route::post('/nouvelleSemester', 'SemesterController@store')->name('admin.semester.store');

	Route::get('/semestre/{semester}/modifier', 'SemesterController@edit')->name('admin.semester.edit');

	Route::post('/semestre/{semester}/modifier', 'SemesterController@update')->name('admin.semester.update');

	Route::delete('/semestre/{semester}/supression', 'SemesterController@destroy')->name('admin.semester.destroy');


	/* Unite d'enseignement UE -----------------------------------------------------------------------------------------*/

	Route::get('/Unite', 'UnitieController@index')->name('admin.unity.index');

	Route::get('/nouvelleUnite', 'UnitieController@create')->name('admin.unity.create');

	Route::post('/nouvelleUnite', 'UnitieController@store')->name('admin.unity.store');

	Route::get('/Unite/{unitie}/modifier', 'UnitieController@edit')->name('admin.unity.edit');

	Route::post('/Unite/{unitie}/modifier', 'UnitieController@update')->name('admin.unity.update');

	Route::get('/Unite/{unitie}/supprimer', 'UnityController@destroy')->name('admin.unity.destroy');


	//------------------------------------gestion des Notes ---------------------------------------------//


	//liste des notes de
	Route::get('/liste/notes', 'MarkController@index')->name('marks.index');

	//ajiuter une notes
	Route::get('/ajoute/ajout', 'MarkController@create')->name('marks.create');

	//enregistrer une note
	Route::post('/enregistrement/note/', 'MarkController@store')->name('marks.store');

	//liste matieres d'un étudiant

	Route::post('notes/matieres', 'MarkController@getSubjects')->name('marks.subject');
	//update une note
	Route::post('/modification/note/{mark}', 'MarkController@update')->name('marks.update');

	// editer ue note
	Route::get('/modification/{mark}/note', 'MarkController@edit')->name('marks.edit');
	//supprimer une note
	Route::get('/supprimer/{mark}/note', 'MarkController@destroy')->name('marks.destroy');




	/* Emploi du temps  -----------------------------------------------------------------------------------------*/

	Route::get('/emploi du temps/liste', 'ClassRoutineController@index')->name('admin.schedule.index');

	Route::get('/emploi du temps/classe', 'ClassRoutineController@getClasse')->name('admin.schedule.getClasse');

	Route::get('/emploi du temps/professeur', 'ClassRoutineController@getProfesseur')->name('admin.schedule.getProfesseur');

	Route::post('/emploi du temps/classe', 'ClassRoutineController@classe')->name('admin.schedule.classe');

	Route::post('/emploi du temps/professeur', 'ClassRoutineController@professeur')->name('admin.schedule.professeur');

	Route::get('/emploi du temps/impression/{classe}', 'ClassRoutineController@printScheduleClasse')->name('admin.schedule.printScheduleClasse');

	Route::get('/emploi_du_temps/impression/{teacher}', 'ClassRoutineController@printScheduleProfesseur')->name('admin.schedule.printScheduleProfesseur');

	Route::get('/emploi du temps/edit/{class_routine}', 'ClassRoutineController@edit')->name('admin.schedule.edit');

	Route::get('/emploi du temps/show/{class_routine}', 'ClassRoutineController@show')->name('admin.schedule.show');

	Route::post('/emploi du temps/store', 'ClassRoutineController@store')->name('admin.schedule.store');

	Route::post('/emploi du temps/update/{class_routine}', 'ClassRoutineController@update')->name('admin.schedule.update');

	Route::get('/emploi du temps/create', 'ClassRoutineController@create')->name('admin.schedule.create');

	Route::get('/emploi du temps/destroy', 'ClassRoutineController@index')->name('admin.schedule.destroy');





	/* Gestion des emprunts -------------------------------- ------------------------------*/

	// liste des emprunts
	Route::get('/emprunt/liste', 'BookIssueController@index')->name('admin.book_issu.index');

	// afficher un emprunt
	Route::get('/livre/{book_issue}/detail', 'BookIssueController@show')->name('admin.book_issu.show');

	// editer un emprunt
	Route::get('/livre/{book_issue}/modification', 'BookIssueController@edit')->name('admin.book_issu.edit');

	// supprimer un emprunt
	Route::get('/livre/{book_issue}/suppréssion', 'BookIssueController@destriy')->name('admin.book_issu.destroy');

	// ajouter un emprunt
	Route::get('/nouveau-emprunt', 'BookIssueController@create')->name('admin.book_issu.create');

	// enregistrer un emprunt
	Route::post('/livre/emprunt/enregistrement', 'BookIssueController@store')->name('admin.book_issu.store');

	// rendre un livre
	Route::get('/livre/rendre-livre/{book_issue}', 'BookIssueController@return')->name('admin.book_issu.return');

	// mettre a jour un emprunt
	Route::post('/livre/mise-à-jour/{book_issue}', 'BookIssueController@update')->name('admin.book_issu.update');



	/* ----------------------------gestion des parents --------------------------*/

	Route::get('/parents', 'ParentController@index')->name('admin.parent.index');

	Route::get('/parents/{parent}/détail', 'ParentController@show')->name('admin.parent.show');

	Route::get('/parents/{parent}/étudiant', 'ParentController@student')->name('admin.parent.student');


	/* ----------------------------gestion des abscence --------------------------*/

	Route::get('/absences', 'StudentAttendanceController@index')->name('admin.student_attendance.index');

	Route::get('/absences/{student_attendance}/détail', 'StudentAttendanceController@show')->name('admin.student_attendance.show');

	Route::get('/absence/ajout', 'StudentAttendanceController@create')->name('admin.student_attendance.create');

	Route::get('/absence/{student_attendance}/supprimer', 'StudentAttendanceController@destroy')->name('admin.student_attendance.destroy');

	Route::post('/absences/enregistrement', 'StudentAttendanceController@store')->name('admin.student_attendance.store');

	Route::get('/absence/{student_attendance}/modifier', 'StudentAttendanceController@edit')->name('admin.student_attendance.edit');

	Route::post('/absence/{student_attendance}/modification_save', 'StudentAttendanceController@update')->name('admin.student_attendance.update');


	// gestion des comptes des étudiants
	Route::get('/compte/étudiant', 'StudentsController@comptes')->name('admin.student.compte');

	Route::post('/compte/action/{user}', 'StudentsController@updateCompte')->name('admin.student.updateCompte');

	//----- gestion des historique

	Route::get('/historique', 'AdminController@historique')->name('admin.historique.index');

	Route::get('/historique/{historique}', 'AdminController@historiqueUpdate')->name('admin.historique.update');





	// gestion des roles et permissions 



	Route::get('roles', 'RoleController@index')->name('admin.role.index');

	Route::post('roles/ajout', 'RoleController@store')->name('admin.role.store');

	Route::post('roles/{id}', 'RoleController@update')->name('admin.role.update');

	Route::get('roles/détail/{id}', 'RoleController@show')->name('admin.role.show');

	Route::get('roles/edit/{id}', 'RoleController@edit')->name('admin.role.edit');

	Route::get('roles/destroy/{id}', 'RoleController@destroy')->name('admin.role.destroy');

	//* attribution des roles  */
	Route::get('role/attribution', 'RoleController@attributionIndex')->name('admin.role.attribution');

	Route::post('role/attribution', 'RoleController@attributionStore')->name('admin.role.attribution.store');

	Route::post('role/attribution/{id}', 'RoleController@attributionUpdate')->name('admin.role.attribution.update');

	Route::get('role/attribution/{id}', 'RoleController@attributionEdit')->name('admin.role.attribution.edit');

	Route::get('role/destroy/{id}', 'RoleController@attributionDestroy')->name('admin.role.attribution.destroy');

	/* permission */

	Route::get('permission', 'PermissionController@index')->name('admin.permission.index');

	Route::post('permission/ajout', 'PermissionController@store')->name('admin.permission.store');

	Route::post('permission/{id}', 'PermissionController@update')->name('admin.permission.update');

	Route::get('permission/détail/{id}', 'PermissionController@show')->name('admin.permission.show');

	Route::get('permission/edit/{id}', 'PermissionController@edit')->name('admin.permission.edit');

	Route::get('permission/destriy/{id}', 'PermissionController@destroy')->name('admin.permission.destroy');




	/* gestion des exportation des etudiants */
	Route::get('export étudiants/excel', 'ExportExcelController@export_student_exel')->name('admin.export.export_student_excel');
	Route::get('export étudiants/pdf', 'ExportExcelController@export_student_pdf')->name('admin.export.export_student_pdf');
	Route::get('export classe/excel/{classe}', 'ExportExcelController@export_classe_excel')->name('admin.export.export_classe_excel');
	Route::get('export classe/pdf/{classe}', 'ExportExcelController@export_classe_pdf')->name('admin.export.export_classe_pdf');

	/* gestion des importation des étudiant */
	Route::get('import/étudiant', 'ExportExcelController@import_student_mark')->name('admin.import.student_mark.create');

	Route::post('importation/notes', 'ExportExcelController@store_student_mark')
		->name('admin.import.student_mark.store');

	Route::get('import/étudiant/fiche', 'ExportExcelController@ficheMarkStudent')->name('admin.import.student_mark.fiche');




	/* valider une demande_admission */
	Route::get('demande_admission/validation/{id}', 'AdmissionRequestController@admission_request_valider')->name('admission_request.valider');


	/* gestion des bulletins  */

	 Route::get('notes/étudiant/{student}', 'MarkController@students_marks')->name('admin.mark.notes');
 
	 Route::get('liste des étudiants/','MarkController@students_liste')->name('admin.mark.list_student');
});
