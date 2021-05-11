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


	/* CLASSES --------------------------------------------------------------------------------------------*/

	Route::get('/classes', 'ClassesController@index')->name('classes.index');

	Route::get('/new-classe', 'ClassesController@create')->name('classes.create');

	Route::post('/create-classes', 'ClassesController@store')->name('classes.store');

	Route::get('/modifie-classe/{id}', 'ClassesController@edit')->name('classes.edit');

	Route::get('/update-classe/{id}', 'ClassesController@update')->name('classes.update');

	Route::get('/delete-classe/{id}', 'ClassesController@destroy')->name('classes.destroy');


	/* notifications -------------------------------------------------------- */

	Route::get('supervisor/notifications','SupervisorsController@indexNotification')->name('messagesSupervisor.index');

	Route::post('supervisor/notifications-created','SupervisorsController@storeNotification')->name('messagesSupervisor.store');
	
	Route::get('supervisor/notifications/{notification}','SupervisorsController@destroyNotification')->name('notificationsSupervisor.destroy');
	
	Route::get('supervisor/messages-show','SupervisorsController@showNotification')->name('notificationSupervisor.show');

	Route::post('supervisor/update/{notification}', 'SupervisorsController@updateNotification')->name('notificationSupervisor.update');



	// examen et devoir 

	Route::get('supervisor/examen' , 'SupervisorsController@examen')->name('supervisor.examen');

	Route::get('supervisor/devoir','SupervisorsController@devoir')->name('supervisor.devoir');



	// liste classe , liste étudiant d'une classe , note étudiant

	
	Route::get('supervisor/coef&bareme','SupervisorsController@coef_barem')->name('supervisor.coef_barem');


	// liste des etudiants pour impression bulletin
	Route::get('supervisor/etudiants','SupervisorsController@students_liste')->name('supervisor.students');
	
	// liste des classes pour impression bulletin
	Route::get('responsable_pedagogique/classes','SupervisorsController@classes_liste')->name('supervisor.classes');



	Route::get('responsable_pedagogique/marks/{student}','SupervisorsController@students_marks')->name('supervisor.marks');
	
	Route::post('responsable_pedagogique/classe','SupervisorsController@search_classe')->name('supervisor.search_classe');
	


	// liste etudiant d'une claase
	Route::get('classe/etudiants/{classe}','SupervisorsController@liste_etudiant')->name('classe.list_etudiant');


	// imprimer bulletin d'un etudiant
	Route::get('etudiant/bulletin/{student}','SupervisorsController@imprimer_bulletin_etudiant')->name('student.imprimer_bulletin');

	//imprimer bulletin d'une classe 
	Route::get('classe/bulletin/{classe}','SupervisorsController@imprimer_bulletin_classe')->name('classe.imprimer_bulletin');
	
	// imprimer maquette d'une classe
	Route::get('/responsable_pedagogique/pdf/{classe}','SupervisorsController@export_pdf')->name('classe.pdf');



	// -------------------------dossier étudiant ---------------------------//

	// liste dossier
	Route::get('responsable-pédagogique/dossier_etudiant/{student}','SupervisorsController@List_dossier')->name('supervisor.student.student_dossier');
	
	// dossier etudiant
	Route::get('responsable-pédagogique/liste_etudiant/','SupervisorsController@Student_dossier')->name('supervisor.student.liste_dossier');

	// bulletin etudiant
	Route::get('responsable-pédagogique/bulletin_etudiant/{student_file}','SupervisorsController@bulletin_student')->name('supervisor.student.bulletin_etudiant');
	
	Route::get('responsable-pédagogique/suppression_bulletin/{id}','SupervisorsController@delete_bulletin_student')->name('supervisor.student.delete_bulletin_etudiant');


	/* classroom -----------------------------------------------------------------------------------------*/
	
	Route::get('/SalleClasse', 'classroomController@index')->name('classroom.index');

	Route::get('/SalleClasse/create', 'classroomController@create')->name('classroom.create');
	Route::post('/SalleClasse/store', 'classroomController@store')->name('classroom.store');
	 
	Route::get('/SalleClasse/list', 'classroomController@list')->name('classroom.list');
 
	Route::get('/SalleClasse/{id}/modifier', 'classroomController@edit')->name('classroom.edit');
	Route::post('/SalleClasse/{id}/modifier', 'classroomController@update')->name('classroom.update');
 
	Route::get('/SalleClasse/{id}/suprrrimer', 'classroomController@delete')->name('classroom.delete');

	 /* classes -----------------------------------------------------------------------------------------*/
	 
	Route::get('/classes1', 'ClassesController@index1')->name('classes1.index1');
	Route::get('/nouvelle-classe1', 'ClassesController@create1')->name('classes1.create1');
	Route::post('/nouvelle-classe1', 'ClassesController@store1')->name('classes1.store1');
 
	Route::get('/classes1/list', 'ClassesController@list1')->name('classes1.list1');
 
	Route::get('/classes1/{id}', 'ClassesController@edit1')->name('classes1.edit1');
	Route::post('/classes1/{id}', 'ClassesController@update1')->name('classes1.update1');
 
	Route::get('/classes1/{id}/supprimer', 'ClassesController@destroy1')->name('classes1.destroy1');
 
	 /* Emploi du temps -----------------------------------------------------------------------------------------*/
   
	Route::get('/emploi', 'SupervisorsController@index')->name('emploi.index');
 
	 Route::get('/nouvelleEmploi', 'SupervisorsController@create')->name('emploi.create');
	 Route::post('/nouvelleEmploi', 'SupervisorsController@store')->name('emploi.store');
 
	 Route::post('/emploi/liste', 'SupervisorsController@list')->name('emploi.list');
	 Route::get('/emploi/{code}', 'SupervisorsController@pdf')->name('emploi.imprimer');
 
	 Route::get('/emploi/{id}/modifier', 'SupervisorsController@edit')->name('emploi.edit');
	 Route::post('/emploi/{id}/modifier', 'SupervisorsController@update')->name('emploi.update');
 
	 Route::get('/emploi/{id}/suprimer', 'SupervisorsController@delete')->name('emploi.destroy');
 
 
 
	 /* Matiere = cours -----------------------------------------------------------------------------------------*/
	 
	 Route::get('/matiere', 'SupervisorsController@indexM')->name('matiere.indexM');
	 Route::get('/matiere/list', 'SupervisorsController@listM')->name('matiere.listM');
 
	 Route::get('/nouvelleMatiere', 'SupervisorsController@createM')->name('matiere.createM');
	 Route::post('/nouvelleMatiere', 'SupervisorsController@storeM')->name('matiere.storeM');
 
	 Route::get('/matiere/{id}/modifier', 'SupervisorsController@editM')->name('matiere.editM');
	 Route::post('/matiere/{id}/modifier', 'SupervisorsController@updateM')->name('matiere.updateM');
 
	 Route::get('/matiere/{id}/suprimer', 'SupervisorsController@deleteM')->name('matiere.destroyM');
 
	 /* Semestre -----------------------------------------------------------------------------------------*/
	 
	 Route::get('/semestre', 'SupervisorsController@indexS')->name('semester.indexS');
	 
	 Route::get('/nouvelleSemestre', 'SupervisorsController@createS')->name('semester.createS');
	 Route::post('/nouvelleSemester', 'SupervisorsController@storeS')->name('semester.storeS');
 
	 Route::get('/semestre/{id}/modifier', 'SupervisorsController@editS')->name('semester.editS');
	 Route::post('/semestre/{id}/modifier', 'SupervisorsController@updateS')->name('semester.updateS');
 
   /* Unite d'enseignement UE -----------------------------------------------------------------------------------------*/
	 
	 Route::get('/Unite', 'SupervisorsController@indexU')->name('unity.indexU');
 
	 Route::get('/nouvelleUnite', 'SupervisorsController@createU')->name('unity.createU');
	 Route::post('/nouvelleUnite', 'SupervisorsController@storeU')->name('unity.storeU');
 
	 Route::get('/Unite/{id}/modifier', 'SupervisorsController@editU')->name('unity.editU');
	 Route::post('/Unite/{id}/modifier', 'SupervisorsController@updateU')->name('unity.updateU');
	 
	 Route::get('/Unite/{id}/supprimer', 'SupervisorsController@destroyU')->name('unity.destroyU');
 
	 /* TEACHERS -----------------------------------------------------------------------------------------*/
	 Route::get('professeurs', 'SupervisorsController@indexTeacher')->name('teachers.index');
 
	 Route::get('/nouveau-prof', 'SupervisorsController@createTeacher')->name('teachers.create');
	 Route::post('/nouveau-prof', 'SupervisorsController@storeTeacher')->name('teachers.store');
 
	 Route::get('/prof/{id}/modifier', 'SupervisorsController@editTeacher')->name('teachers.edit');
	 Route::post('/prof/{id}/modifier', 'SupervisorsController@updateTeacher')->name('teachers.update');

	 Route::get('/prof/{id}/details', 'SupervisorsController@showTeacher')->name('teachers.show');
 
	 Route::get('/prof/{id}/supprimer', 'SupervisorsController@destroy')->name('teachers.destroy');

	 Route::get('/prof/{id}/emploie du temps', 'SupervisorsController@classe_routineTeacher')->name('teachers.classe_routine');
	 
	 Route::get('/prof/{teacher}/impression emploi du temp', 'SupervisorsController@print_class_routineTeacher')->name('teachers.print_class_routine');

	//  rama
	 	//Admission
	Route::resource('admissions', 'AdmissionController');

	Route::get('/create', 'AdmissionController@create');

	Route::get('/create_ad', 'AdmissionController@validation')->name('admissions.validation');

	Route::post('/validation', 'AdmissionController@validation')->name('admissions.validation');

	Route::get('/delete/{id}', 'AdmissionController@destroy')->name('admissions.delete');

	Route::get('/update', 'AdmissionControllers@update')->name('admissions.update');

	Route::get('/edit/{id}', 'AdmissionController@edit');

	
	//EtudiantsRedoublant

	Route::get('liste_Redoublants', 'SupervisorsController@redoublants')->name('abscence.index');

	Route::get('/create', 'EtudiantsRedoublantController@create');

	Route::get('/create-redouble', 'EtudiantsRedoublantController@validation')->name('etudiantsRedoublants.validation');
	
	//Reclaetudiant
	Route::resource('reclaetudiants', 'ReclaetudiantController');

	Route::get('/update', 'ReclaetudiantControllerr@update')->name('reclaetudiants.update');
	

	//Admission_request

	Route::get('demande_admission/validation/{id}', 'AdmissionRequestController@admission_request_valider')->name('admission_request.valider');

	Route::get('liste_demandes', 'AdmissionRequestController@admission_request_liste')->name('admission_request.liste');


	Route::get('demande_admission/detail/{id}', 'AdmissionRequestController@detailDossier')->name('admission_requests.detail');
	
	Route::get('demande_admission/suppression/{id}', 'AdmissionRequestController@admission_request_delete')->name('admission_requests.destroy');



	// liste des semestre de chaque classe
	Route::get('liste des semestres/{id}','SupervisorsController@liste_des_semestre')->name('supervisor.liste_semestre');
	
	
	// liste des unite et matieres de chaque semestre
	Route::get('liste des UE et matires/{id}','SupervisorsController@liste_des_unite_matiere')->name('supervisor.liste_ue_matiere');

	// liste des emplois du temps des professeurs	
	Route::get('emploi_du_temps/professeurs/','SupervisorsController@teacher_class_routine')->name('teachers.class_routines.index');



		//Student

		Route::get('étudiant/nouveau', 'StudentsController@createStudent')->name('supervisor.students.create');
	
		Route::get('/liste_des_étudiants', 'StudentsController@indexStudent')->name('supervisor.students.index');
		
		Route::get('/étudiant/détail/{id}', 'StudentsController@showStudent')->name('supervisor.students.show');
	
		Route::get('étudiant/modification/{id}', 'StudentsController@editStudent')->name('supervisor.students.edit');
		
		Route::get('étudiant/enregistrement', 'StudentsController@storeStudent')->name('supervisor.students.validation');
	
		Route::POST('étudiant/enregistrement', 'StudentsController@storeStudent')->name('supervisor.students.store');
		
		Route::post('étudiant/mise_à_jour/{id}', 'StudentsController@updateStudent')->name('supervisor.students.update');
		
		Route::get('étudiant/suppression/{id}', 'StudentsController@destroyStudent')->name('supervisor.students.delete');
	
	
	
		Route::get('/liste_demande/{id}', 'StudentsController@list')->name('reinscription_student.liste');
		
		Route::get('/étudiant/{id}', 'StudentsController@accepte_student')->name('reinscription_student.accepter');
		
		Route::post('/étudiant/{id}/accepter', 'StudentsController@save_accepte')->name('reinscription_student.saveAccepte');
		
	
		Route::get('/inscription', 'StudentsController@create');
	
		//Student_attendance
		Route::resource('student_attendances', 'StudentAttendanceController');
	
		Route::get('/update', 'StudentAttendancer@update')->name('student_attendances.update');
	
		Route::get('/edit/{id}', 'StudentAttendancer@edit');
	
		Route::get('/delete/{id}', 'StudentAttendance@destroy')->name('student_attendances.delete');
	
		Route::get('/liste classes', 'StudentsController@indexDA')->name('admission_demande.index');

});

