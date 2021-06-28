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
Route::group(['middleware' => ['auth']], function () {
    // Route::group(['prefix' => 'supervisor', 'middleware' => ['auth']], function () {


    /* CLASSES --------------------------------------------------------------------------------------------*/

    Route::get('/classes', 'ClassesController@index')->name('classes.index');

    Route::get('/new-classe', 'ClassesController@create')->name('classes.create');

    Route::post('/create-classes', 'ClassesController@store')->name('classes.store');

    Route::get('/modifie-classe/{id}', 'ClassesController@edit')->name('classes.edit');

    Route::get('/update-classe/{id}', 'ClassesController@update')->name('classes.update');

    Route::get('/delete-classe/{id}', 'ClassesController@destroy')->name('classes.destroy');


    /* notifications -------------------------------------------------------- */

    Route::get('supervisor/notifications', 'SupervisorsController@indexNotification')->name('messagesSupervisor.index');

    Route::post('supervisor/notifications-created', 'SupervisorsController@storeNotification')->name('messagesSupervisor.store');

    Route::get('supervisor/notifications/{notification}', 'SupervisorsController@destroyNotification')->name('notificationsSupervisor.destroy');

    Route::get('supervisor/messages-show', 'SupervisorsController@showNotification')->name('notificationSupervisor.show');

    Route::post('supervisor/update/{notification}', 'SupervisorsController@updateNotification')->name('notificationSupervisor.update');



    // examen et devoir

    Route::get('supervisor/examen', 'SupervisorsController@examen')->name('supervisor.examen');

    Route::get('supervisor/devoir', 'SupervisorsController@devoir')->name('supervisor.devoir');



    // liste classe , liste étudiant d'une classe , note étudiant


    Route::get('supervisor/coef&bareme', 'SupervisorsController@coef_barem')->name('supervisor.coef_barem');


    // liste des etudiants pour impression bulletin
    Route::get('supervisor/etudiants', 'SupervisorsController@students_liste')->name('supervisor.students');

    // liste des classes pour impression bulletin
    Route::get('responsable_pedagogique/classes', 'SupervisorsController@classes_liste')->name('supervisor.classes');



    Route::get('responsable_pedagogique/marks/{student}', 'SupervisorsController@students_marks')->name('supervisor.marks');

    Route::post('responsable_pedagogique/classe', 'SupervisorsController@search_classe')->name('supervisor.search_classe');



    // liste etudiant d'une claase
    Route::get('classe/etudiants/{classe}', 'SupervisorsController@liste_etudiant')->name('classe.list_etudiant');


    // imprimer bulletin d'un etudiant
    Route::get('etudiant/bulletin/{student}', 'SupervisorsController@imprimer_bulletin_etudiant')->name('student.imprimer_bulletin');

    //imprimer bulletin d'une classe
    Route::get('classe/bulletin/{classe}', 'SupervisorsController@imprimer_bulletin_classe')->name('classe.imprimer_bulletin');

    // imprimer maquette d'une classe
    Route::get('/responsable_pedagogique/pdf/{classe}', 'SupervisorsController@export_pdf')->name('classe.pdf');


    // ----------------------- gestion des filieres et des niveaux ------------//
    /**
     * gestion des niveaux
     **/
    // ajoutre un niveau
    Route::post('niveaux', 'NiveauController@store')->name('supervisor.niveau.add');

    // liste des niveaux
    Route::get('niveaux', 'NiveauController@index')->name('supervisor.niveau');

    // editer un niveau
    Route::post('niveaux/modification/{niveau}', 'NiveauController@update')->name('supervisor.niveau.update');



    // supprimer un niveau
    Route::get('niveaux/{niveau}', 'NiveauController@destroy')->name('supervisor.niveau.delete');


    /**
     * gestion des filieres
     **/
    // ajoutre une filiere
    Route::post('filieres', 'FiliereController@store')->name('supervisor.filiere.add');

    // liste des filiere
    Route::get('filieres', 'FiliereController@index')->name('supervisor.filiere');

    // editer une filiere
    Route::post('filieres/modification/{filiere}', 'FiliereController@update')->name('supervisor.filiere.update');



    // supprimer une filiere
    Route::get('filieres/{filiere}', 'FiliereController@destroy')->name('supervisor.filiere.delete');



    // -------------------------dossier étudiant ---------------------------//

    // liste dossier
    Route::get('responsable-pédagogique/dossier_etudiant/{student}', 'SupervisorsController@List_dossier')->name('supervisor.student.student_dossier');

    // dossier etudiant
    Route::get('responsable-pédagogique/liste_etudiant/', 'SupervisorsController@Student_dossier')->name('supervisor.student.liste_dossier');

    // bulletin etudiant
    Route::get('responsable-pédagogique/bulletin_etudiant/{student_file}', 'SupervisorsController@bulletin_student')->name('supervisor.student.bulletin_etudiant');

    Route::get('responsable-pédagogique/suppression_bulletin/{id}', 'SupervisorsController@delete_bulletin_student')->name('supervisor.student.delete_bulletin_etudiant');


    /* classroom -----------------------------------------------------------------------------------------*/

    Route::get('/SalleClasse', 'classroomController@index')->name('classroom.index');

    Route::get('/SalleClasse/create', 'classroomController@create')->name('classroom.create');
    Route::post('/SalleClasse/store', 'classroomController@store')->name('classroom.store');

    Route::get('/SalleClasse/list', 'classroomController@list')->name('classroom.list');

    Route::get('/SalleClasse/{id}/modifier', 'classroomController@edit')->name('classroom.edit');
    Route::post('/SalleClasse/{id}/modifier', 'classroomController@update')->name('classroom.update');

    Route::get('/SalleClasse/{id}/suprrrimer', 'classroomController@delete')->name('classroom.delete');

    /* classes -----------------------------------------------------------------------------------------*/

    // Route::get('/classes1', 'ClassesController@index1')->name('classes1.index1');
    // Route::get('/nouvelle-classe1', 'ClassesController@create1')->name('classes1.create1');
    // Route::post('/nouvelle-classe1', 'ClassesController@store1')->name('classes1.store1');

    // Route::get('/classes1/list', 'ClassesController@list1')->name('classes1.list1');

    // Route::get('/classes1/{id}', 'ClassesController@edit1')->name('classes1.edit1');
    // Route::post('/classes1/{id}', 'ClassesController@update1')->name('classes1.update1');

    // Route::get('/classes1/{id}/supprimer', 'ClassesController@destroy1')->name('classes1.destroy1');

    Route::get('/classes', 'ClassesController@index')->name('supervisor.classe.index');
    // // creer une classe

    Route::post('/classe/création', 'ClassesController@store')->name('supervisor.classe.store');


    // liste des étudiants d'une classe
    Route::get('classe/liste des étudiants/{classe}', 'ClassesController@ClasseStudent')->name('supervisor.classes.liste_student');

    Route::get('classe/semestres/{classe}', 'SemesterController@ClasseSemester')->name('supervisor.classe.semester');

    Route::post('classe/{classe}/update', 'ClassesController@update')->name('supervisor.classe.update');

    Route::get('semestres/ue/{semestre}', 'SemesterController@SemesterUnitie')->name('supervisor.semester.unitie');


    /* Unite d'enseignement UE -----------------------------------------------------------------------------------------*/

    Route::get('/Unite', 'UnitieController@index')->name('supervisor.unity.index');

    Route::get('/nouvelleUnite', 'UnitieController@create')->name('supervisor.unity.create');

    Route::post('/nouvelleUnite', 'UnitieController@store')->name('supervisor.unity.store');

    Route::get('/Unite/{unitie}/modifier', 'UnitieController@edit')->name('supervisor.unity.edit');

    Route::post('/Unite/{unitie}/modifier', 'UnitieController@update')->name('supervisor.unity.update');

    Route::get('/Unite/{unitie}/supprimer', 'UnityController@destroy')->name('supervisor.unity.destroy');


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
    Route::get('liste des semestres/{id}', 'SupervisorsController@liste_des_semestre')->name('supervisor.liste_semestre');


    // liste des unite et matieres de chaque semestre
    Route::get('liste des UE et matires/{id}', 'SupervisorsController@liste_des_unite_matiere')->name('supervisor.liste_ue_matiere');

    // liste des emplois du temps des professeurs
    Route::get('emploi_du_temps/professeurs/', 'SupervisorsController@teacher_class_routine')->name('teachers.class_routines.index');



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




    /* Emploi du temps  -----------------------------------------------------------------------------------------*/

    Route::get('/emploi du temps/liste', 'ClassRoutineController@index')->name('supervisor.schedule.index');

    Route::get('/emploi du temps/classe', 'ClassRoutineController@getClasse')->name('supervisor.schedule.getClasse');

    Route::get('/emploi du temps/professeur', 'ClassRoutineController@getProfesseur')->name('supervisor.schedule.getProfesseur');

    Route::post('/emploi du temps/classe', 'ClassRoutineController@classe')->name('supervisor.schedule.classe');

    Route::post('/emploi du temps/professeur', 'ClassRoutineController@professeur')->name('supervisor.schedule.professeur');

    Route::get('/emploi du temps/impression/{code}', 'ClassRoutineController@printScheduleClasse')->name('supervisor.schedule.printScheduleClasse');

    Route::get('/emploi_du_temps/impression/{teacher}', 'ClassRoutineController@printScheduleProfesseur')->name('supervisor.schedule.printScheduleProfesseur');

    Route::get('/emploi du temps/edit/{class_routine}', 'ClassRoutineController@edit')->name('supervisor.schedule.edit');

    Route::get('/emploi du temps/show/{class_routine}', 'ClassRoutineController@show')->name('supervisor.schedule.show');

    Route::post('/emploi du temps/store', 'ClassRoutineController@store')->name('supervisor.schedule.store');

    Route::post('/emploi du temps/update/{class_routine}', 'ClassRoutineController@update')->name('supervisor.schedule.update');

    Route::get('/emploi du temps/create', 'ClassRoutineController@create')->name('supervisor.schedule.create');

    Route::get('/emploi du temps/destroy', 'ClassRoutineController@index')->name('supervisor.schedule.destroy');


    /* Matiere = cours -----------------------------------------------------------------------------------------*/

    Route::get('/matiere', 'SubjectController@index')->name('supervisor.subject.index');

    Route::get('/gestion des matieres', 'SubjectController@index_gestion')->name('supervisor.subject.index_gestion');

    Route::get('/nouvelleMatiere', 'SubjectController@create')->name('supervisor.subject.create');

    Route::post('/nouvelleMatiere', 'SubjectController@store')->name('supervisor.subject.store');

    Route::get('/matiere/{subject}/modifier', 'SubjectController@edit')->name('supervisor.subject.edit');

    Route::post('/matiere/{subject}/modifier', 'SubjectController@update')->name('supervisor.subject.update');

    Route::get('/matiere/{subject}/suprimer', 'SubjectController@destroy')->name('supervisor.subject.destroy');


    /* Semestre -----------------------------------------------------------------------------------------*/

    Route::get('/semestre', 'SemesterController@index')->name('supervisor.semester.index');

    Route::get('/nouvelleSemestre', 'SemesterController@create')->name('supervisor.semester.create');

    Route::post('/nouvelleSemester', 'SemesterController@store')->name('supervisor.semester.store');

    Route::get('/semestre/{semester}/modifier', 'SemesterController@edit')->name('supervisor.semester.edit');

    Route::post('/semestre/{semester}/modifier', 'SemesterController@update')->name('supervisor.semester.update');

    Route::delete('/semestre/{semester}/supression', 'SemesterController@destroy')->name('supervisor.semester.destroy');


    //------------------------------------gestion des Notes ---------------------------------------------//


    //liste des notes de
    Route::get('/liste/notes', 'MarkController@index')->name('supervisor.marks.index');

    //ajiuter une notes
    Route::get('/ajoute/ajout', 'MarkController@create')->name('supervisor.marks.create');

    //enregistrer une note
    Route::post('/enregistrement/note/', 'MarkController@store')->name('supervisor.marks.store');

    //liste matieres d'un étudiant

    Route::post('notes/matieres', 'MarkController@getSubjects')->name('supervisor.marks.subject');
    //update une note
    Route::post('/modification/note/{mark}', 'MarkController@update')->name('supervisor.marks.update');

    // editer ue note
    Route::get('/modification/{mark}/note', 'MarkController@edit')->name('supervisor.marks.edit');
    //supprimer une note
    Route::get('/supprimer/{mark}/note', 'MarkController@destroy')->name('supervisor.marks.destroy');


    /* gestion des exportation des etudiants */
    Route::get('export étudiants/excel', 'ExportExcelController@export_student_exel')->name('supervisor.export.export_student_excel');
    Route::get('export étudiants/pdf', 'ExportExcelController@export_student_pdf')->name('supervisor.export.export_student_pdf');
    Route::get('export classe/excel/{classe}', 'ExportExcelController@export_classe_excel')->name('supervisor.export.export_classe_excel');
    Route::get('export classe/pdf/{classe}', 'ExportExcelController@export_classe_pdf')->name('supervisor.export.export_classe_pdf');

    /* gestion des importation des étudiant */
    Route::get('import/étudiant', 'ExportExcelController@import_student_mark')->name('supervisor.import.student_mark.create');

    Route::post('importation/notes', 'ExportExcelController@store_student_mark')
        ->name('supervisor.import.student_mark.store');

    Route::get('import/étudiant/fiche', 'ExportExcelController@ficheMarkStudent')->name('supervisor.import.student_mark.fiche');
});
