<?php

namespace App\Http\Controllers;

use App\Model\Bulletin\Note;
use App\Model\Bulletin\Unite;
use App\Models\Academic_year;
use App\Models\Assign_subject;
use App\Models\Bulletin;
use App\Models\Class_routine;
use App\Models\Classe;
use App\Models\Classroom;
use App\Models\Mark;
use App\Models\Message;
use App\Models\Semester;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Student_file;
use App\Models\StudentRedouble;
use App\Models\Subject;
use App\Models\Supervisor;
use App\Models\Teacher;
use App\Models\Unitie;
use App\Models\User;
use App\Notifications\Notifications;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use DateTime;
use Dompdf\Dompdf;
use Dompdf\Options;
use Facade\FlareClient\Time\SystemTime;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PDF;
use Ramsey\Uuid\Type\Time;

class SupervisorsController extends Controller
{

    public function indexNotification()
    {
        $notifications_sender = DatabaseNotification::all();

        $notifications = auth()->user()->notifications;

        $users = User::all();
        return view('backend.'.Auth::user()->role.'.notifications.index',[
            'notifications'=> $notifications,
            'users' => $users,
            'notifications_sender' => $notifications_sender
        ]);
    }
    public function storeNotification(Request $request)
    {
        
                request()->validate([
                    'subject' => ['required', 'string', 'max:255'],
                    'body' => ['required', 'string', 'max:255'],
                    'email' => ['required'],
                ]); 
                $files = $request->file('attachment');
          
                if($request->hasFile('attachment'))
                {
                    foreach ($files as $file) {
    
                        $filename = $file->getClientOriginalName();
                        $name = "uploads/messages/" .$filename;
                        $file->move(public_path('uploads/messages'), $filename);
                        $data[] = $name;
                    }
                }else{
                    $data = [];
                }

                if( request()->email != null )
                {
                    
                    $message  = new Message();
                    $message->subject = request()->subject;
                    $message->body = request()->body;
                    $message->attachment = $data;
                    $message->date = new DateTime('now');

                    if(request()->email == 'parent' || request()->email == 'student' || 
                            request()->email == 'teacher' || request()->email == 'supervisor' ||
                            request()->email == 'accountant' || request()->email == 'librian' ||
                            request()->email == 'admin' )
                    {
                        $user_group = User::where('role',request()->email)->get();
                        foreach ($user_group as $user) {
                            $user->notify(new Notifications($message, auth()->user(),$user));
                        }  
                    }
                    else {

                        $user = User::where('email',request()->email)->firstorFail();
                        $user->notify(new Notifications($message, auth()->user(),$user));
                    }
                }
           

            return redirect()->action('SupervisorsController@indexNotification')->with('success', 'Message bien envoyé');

    }

    public function showNotification(Message $message)
    { 
        if(auth()->user()->unreadNotifications->count() == 0 ){
            return redirect()->action('SupervisorsController@indexNotification')->with('error','Vous n\'avez pas de nouveau notification ');
        }
        return redirect()->action('SupervisorsController@indexNotification');

    }
    public function updateNotification( DatabaseNotification $notification)
    {
        $notification->markAsRead();
        
        return redirect()->action('SupervisorsController@indexNotification')->with('success','notification marqué comme lu ');
    }    
    public function destroyNotification(DatabaseNotification $notification)
    {

        $notification->delete();
       
        return redirect()->back()->with('success','message supprimé ');
    }
 

    public function coef_barem(){

        $classes = Classe::all();
        
        $classe = '';
        return view('backend.'.Auth::user()->role.'.examen_notation.coef&barem',[
            'classes' =>$classes,
            'classe'=> $classe
        ]);
    }

    public function search_classe(Request $request){
          
            request()->validate([
                'classe' => ['required']
            ]);

            $classe =  Classe::where('nameClass',$request->classe)->first();
           
            $classes = Classe::all();
            return view('backend.'.Auth::user()->role.'.examen_notation.coef&barem',[
                'classe' => $classe,
                'classes' =>$classes
                
            ]);
            
    }
    public function students_liste(){

        $students = Student::all();

        return view('backend.'.Auth::user()->role.'.examen_notation.index_student',[
            'students'=>$students
        ]);
    }

    public function students_marks(Student $student){
       
        $student->bulletin();
      
        $datas = json_decode ($student->bulletin->data,true);
       
        return view('backend.'.Auth::user()->role.'.examen_notation.notes',[
            'student' => $student,
            'datas' =>$datas,
        ]);
    }
    
    public function classes_liste(){
        $classes = Classe::all();
        
        return view('backend.'.Auth::user()->role.'.examen_notation.index_classe',[
            'classes' => $classes,
            ]);
    }
    public function imprimer_bulletin_etudiant(Student $student){

        $logo = Setting::where('code','logo')->get()->first();
       
        $path = public_path('/images/settings/logo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $student->bulletin();
       
        $datas = json_decode ($student->bulletin->data,true);
        
        $pdf = PDF::loadView('backend.supervisor.examen_notation.bulletin', [
            'student' => $student,
            'datas' =>$datas,
            'logo' => $logo
        ])->setPaper('a3');
        
        $filename = $student->classe->code.'-'.$student->ine;
        $classe = $student->classe->code;


        $content = $pdf->download()->getOriginalContent();

        Storage::put('public/bulletins/'.$classe.'/'.$filename.'.pdf',$content) ;

        return $pdf->download($student->user->email.'.pdf');

    }

    public function liste_etudiant(Classe $classe){
        return view('backend.'.Auth::user()->role.'.examen_notation.classe',[
            'classe' => $classe,
        ]);      
        
    }
    public function imprimer_bulletin_classe(Classe $classe){
       
        $logo = Setting::where('code','logo')->get()->first();
       
        $path = public_path('/images/settings/logo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);

        foreach ($classe->student as $student) {

            $student->bulletin();
            $datas = json_decode ($student->bulletin->data,true);
            
            $pdf = PDF::loadView('backend.supervisor.examen_notation.bulletin', [
                'student' => $student,
                'datas' =>$datas,
                'logo' => $logo
            ]);

            $filename = $student->classe->code.'-'.$student->ine;
            $classe = $student->classe->code;

            $content = $pdf->download()->getOriginalContent();

            Storage::put('public/bulletins/'.$classe.'/'.$filename.'.pdf',$content) ;

        }

        return redirect()->back()->with('success','impression des bulletion réussie');
         
        
    }
    
    // imprimer maquette d'une classe
    public function export_pdf(Classe $classe){
       
        $logo = Setting::where('code','logo')->get()->first();
       
        $path = public_path('/images/settings/logo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::loadView('backend.supervisor.examen_notation.maquette',
                compact('classe','logo')); 
        
         return $pdf->download($classe->nameClass.'.pdf');
        
    }

    
    // liste dossier d'etudiant
    public function List_dossier(Student $student){
    
        $dossiers =  Student_file::where('student_id',$student->id)->get();

        return view('backend.'.Auth()->user()->role.'.student_file.dossier_etudiant',[
            'dossiers' =>$dossiers
        ]);
        
    }

    // bulletin de note d'un etudiant d'une année donnée
    public function bulletin_student(Student_file $student_file){

        $datas = $student_file->bulletin->data;

        $datas = json_decode ($student_file->bulletin->data,true);

        $filename = $student_file->student->classe->code.'-'.$student_file->student->ine;
        $classe = $student_file-> student->classe->code;

        return view('backend.'.Auth()->user()->role.'.student_file.bulletin',[
            'student_file' => $student_file,
            'datas' =>$datas
        ]);
    }

    // liste dossier etudiants
    public function Student_dossier(){

        $files = Academic_year::all();

        $students = Student::all();

        return view('backend.'.Auth()->user()->role.'.student_file.liste_etudiant',[
            'files' => $files,
            'students' =>$students
        ]);
    }
   
    // supprimer dossier scolaire
    public function delete_bulletin_student($id){
        $student_file = Student_file::findOrfail($id);
        $student_file->bulletin->delete();
        $student_file->delete();

        return redirect()->back()->with('success','suppréssion dossier réussie');
    }

     /* function emploi du temps -------------
    ****************************************************
    *****************************----------------------------------------------------------------------------*/
    
    public function index()
    {
        $classes = Classe::all();
      return view('backend.'.Auth::user()->role.'.Emploi.index',[
          'classes' => $classes
      ]);
    }
    public function create(){
        $teachers = Teacher::all();
        $classes = Classe::all();

		$classrooms = classroom::all();
        $subjects = Subject::all();

        return view('backend.'.Auth()->user()->role.'.Emploi.create',
                    compact('teachers','classrooms','subjects','classes'));
    }
    public function store(Request $request){
        request()->validate([
            'classe_id' => ['required'],
			'classroom_id' => ['required'],
            'subject_id' => ['required'],
            'teacher_id' => ['required'],
            'day' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
        ]);
    
        $classRoutine = new Class_routine();

        $classRoutine->classe_id = $request->classe_id ;
		$classRoutine->classroom_id = $request->classroom_id ;
        $classRoutine->subject_id =  $request->subject_id;
        $classRoutine->teacher_id = $request->teacher_id;
        $classRoutine->day = $request->day;
        $classRoutine->start_time = $request->start_time;
        $classRoutine->end_time = $request->end_time;
        $classRoutine->save();

        $assign_subject = new Assign_subject();
        $assign_subject->subject_id = $request->subject_id;
        $assign_subject->teacher_id = $request->teacher_id;
        $assign_subject->save();


        return redirect()->action('SupervisorsController@index')->with('success','emploi du temps créé avec succés');
    }
    public function edit ($id) {
        
        $classRoutine = Class_routine::where('id',$id)->first();
        
        $classes = Classe::all();
		$classrooms = Classroom::all();
        $teachers = Teacher::all();
        
        $subjects = Subject::all();

        return view('backend.'.Auth()->user()->role.'.Emploi.edit',[
            'classRoutine' => $classRoutine,
            'classes' => $classes,
            'classrooms' => $classrooms,
            'teachers' => $teachers,
            'subjects' => $subjects
        ]);
  
    }
    public function update(Request $request,$id){

        request()->validate([
            'classe_id' => ['required'],
			'classroom_id' => ['required'],
            'subject_id' => ['required'],
            'teacher_id' => ['required'],
            'day' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
        ]);
        $classRoutine = Class_routine::findOrFail($id);
        $classRoutine->update($request->all());

        return redirect()->action('SupervisorsController@index')->with('success','emploi du temps mise en jour');

    }

    public function delete($id){
        $class_routines = Class_routine::where('id',$id);
        $class_routines->delete();

        return redirect()->action('SupervisorsController@index');
    }
    public function list(Request $request){

        $code = $request->code;

        $classe = Classe::where('code',$code)->get()->first();
            
        $class_routines = Class_routine::where('classe_id',$classe->id)->get();
   
        return view('backend.'.Auth::user()->role.'.Emploi.list',[
             'classRoutines' => $class_routines ,
             'code' => $code
            ]);

    }


    public function pdf($code) {

        $classe = Classe::where('code',$code)->get()->first();
        if( $classe != null ){
            $class_routines = Class_routine::where('classe_id',$classe->id)->get();
           
            $pdf = PDF::loadView('backend.'.Auth::user()->role.'.Emploi.fichier',[
                'class_routines'=>$class_routines,
                'code'=>$code
              ]);
              return $pdf->Stream( 'EMPL_'.$classe->code.'.pdf');
        }else {
            return redirect()->back();
        }

    }



       /* function Matiere -----------
   ***********************************************---------------------------------------------------------------           
   
    ****************************************------------------------------------------------------------------------------*/
   
   public function indexM(){
      return view('backend.'.Auth()->user()->role.'.matiere.index');
   }

   public function createM(){
       $unities = Unitie::all();

       return view('backend.'.Auth()->user()->role.'.matiere.create',compact('unities'));
   }
    public function storeM(Request $request){

        request()->validate([
            'name' => ['required'],
            'unity_id' => ['required'],
            'coefficient' => ['required'],
        ]);

        $subject = new Subject();

        $subject->name = $request->name;
        $subject->unity_id = $request->unity_id;
        $subject->coefficient = $request->coefficient;
        $subject->save();

        return redirect()->action('SupervisorsController@listM')->with('success','matiere créer avec succcés');
    }

    public function editM($id){

        $unities = Unitie::all();
        $subjects = Subject::where('id',$id)->first();

        return view('backend.'.Auth()->user()->role.'.matiere.edit',compact('subjects','unities'));
    }
    public function updateM(Request $request,$id){

        request()->validate([
            'name' => ['required'],
            'unity_id' => ['required'],
            'coefficient' => ['required'],
        ]);
        $subject = Subject::findOrFail($id);

        $subject->name = $request->name;
        $subject->unity_id = $request->unity_id;
        $subject->coefficient = $request->coefficient;
        $subject->save();
        
        return redirect()->action('SupervisorsController@listM')->with('success','matiere mise en jour');
    }


    public function listM(){

        $subjects = Subject::all();
        
        return view('backend.'.Auth()->user()->role.'.matiere.list',compact('subjects'));
    }

    public function deleteM($id){
        $subjects = Subject::where('id',$id);
        $subjects->delete();

        return redirect()->action('SupervisorsController@listM')->with('success','matiere supprimée avec succés');
    }


 /* function Semestre ---------------------------------------
 ****************************************************************--------------------------------------------------*/
 
    public function createS(){
        $classes = Classe::all();
        return view('backend.'.Auth()->user()->role.'.semester.create',[
            'classes'=>$classes
        ]);
    }
    public function storeS(Request $request){
        request()->validate([
            'code' => ['required'],
            'name' => ['required'],
            'class_id' => ['required'],
        ]);

        $semester = new Semester();

        $semester->code = $request->code;
        $semester->name = $request->name;
        $semester->class_id = $request->class_id;

        $semester->save();

        return redirect()->action('SupervisorsController@indexS')->with('success','semestre créer avec succés');
    } 
    
    public function indexS(){

        $semesters = Semester::all();
        return view('backend.'.Auth()->user()->role.'.semester.list',compact('semesters'));
    }
    
    public function editS($id){

        $semester = Semester::where('id',$id)->first();
        $classes = Classe::all();
        return view('backend.'.Auth()->user()->role.'.semester.edit',compact('semester','classes'));
    }

    public function updateS(Request $request, $id){

        request()->validate([
            'code'=>['required'],
            'name'=>['required'],
            'class_id'=>['required'],
        ]);
    
        $semester = Semester::findOrFail($id);

        $semester->name = $request->name;
        $semester->code = $request->code;
        $semester->class_id = $request->class_id;

        $semester->save();

        return redirect()->action('SupervisorsController@indexS')->with('success','smestre mise à jour');

    }
    public function deleteS($id){}

    /* function UNITIES -------------------------------
    *****************************************************----------------------------------------------------------*/

    public function indexU(){
        $unities = Unitie::all();

        return  view('backend.'.Auth()->user()->role.'.unity.list',compact('unities'));
    }

    public function createU(){

        $semesters = Semester::all();
        return  view('backend.'.Auth()->user()->role.'.unity.create',compact('semesters'));
    }
    public function storeU(Request $request){
        request()->validate([
            'code' => ['required'],
            'name' => ['required'],
            'semestre_id' => ['required'],
            'credit' => ['required'],
        ]);
      
        $unity = new Unitie();
        $unity->code = $request->code;
        $unity->name = $request->name;
        $unity->semester_id = $request->semestre_id;
        $unity->credit = $request->credit;
        $unity->save();


        return redirect()->action('SupervisorsController@indexU')->with('success','unité d\'enseignement créé avec succès');
    }

    public function editU ($id){

        $semesters = Semester::all();

        $unitie = Unitie::findOrfail($id);
        
        return  view('backend.'.Auth()->user()->role.'.unity.edit',compact('unitie','semesters'));
    }
    public function updateU (Request $request, $id){
        request()->validate([
            'code'=>['required'],
            'name'=>['required'],
            'semestre_id'=>['required'],
            'credit'=>['required'],
        ]);
       
        $unitie = Unitie::findOrFail($id);
        $unitie->code = $request->code; 
        $unitie->name = $request->name; 
        $unitie->semester_id = $request->semestre_id; 
        $unitie->credit = $request->credit; 
        $unitie->save();
    
        return redirect()->action('SupervisorsController@indexU')->with('success','unité d\'enseignement mis à jour');
    }
    public function destroyU($id){
        $unities= Unitie::where('id',$id);
        $unities->delete();

        return redirect()->action('SupervisorsController@indexU')->with('success','unité supprimé avec succès');
    }

    // ***********************Gestion professeur et emploi du temps *************************//

    public function indexTeacher()
    {
        $teachers = Teacher::all();
       
        return view('backend.'.Auth()->user()->role.'.teachers.index', compact('teachers'));
    }
    public function createTeacher(){

        return view('backend.'.Auth()->user()->role.'.teachers.create');
    }
    public function editTeacher($id){
        
        $teacher = Teacher::findOrfail($id);
       
        return view('backend.'.Auth()->user()->role.'.teachers.edit',[
            'teacher'=> $teacher
        ]);
    }
    public function storeTeacher(Request $request){
        request()->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'genre' => ['required'],
            'tel' => ['required','string', 'max:9','min:9'],
            'dateNaissance' => ['required', 'date'],
            'lieuNaissance' => ['required', 'string','min:3','max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], 
          ]);

          
            $user = new User();
           
            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->role = 'teacher';
            $user->tel =   $request->tel;
            $user->genre =   $request->genre;
            $user->adresse =  $request->adresse;
            $user->dateNaissance =  $request->dateNaissance;
            $user->lieuNaissance =  $request->lieuNaissance;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $id = $user->id;
            $date =  date('Y');
           
            $caractere = 'P';
            $matricule = $caractere.''.$id.''.$date;
            
            $professeur = new Teacher();
            $professeur->matricule = $matricule;
            $professeur->user_id = $user->id;
            $user->teacher()->save($professeur);
            
            
            return redirect()->action('SupervisorsController@indexTeacher')->with('success','professeur bien créer');

            
    }
 
    public function showTeacher($id){
        $teacher = Teacher::findOrfail($id);
        return view('backend.'.Auth()->user()->role.'.teachers.show',[
            'teacher'=> $teacher
        ]);
    }

    public function updateTeacher(Request $request, $id){

        $teacher = Teacher::findOrFail($id);

        $user = $teacher->user;

        if ( $user->email == $request->email){

            request()->validate([
                'prenom' => ['required', 'string', 'max:255'],
                'nom' => ['required', 'string', 'max:255'],
                'adresse' => ['required', 'string', 'max:255'],
                'genre' => ['required', 'string'],
                'tel' => ['required','string', 'max:9','min:9'],
                'dateNaissance' => ['required', 'date'],
                'lieuNaissance' => ['required', 'string','min:3','max:100']
              ]);

                $user->nom = $request->nom;
                $user->prenom = $request->prenom;
                $user->tel =   $request->tel;
                $user->adresse =  $request->adresse;
                $user->genre= $request->genre;
                $user->dateNaissance =  $request->dateNaissance;
                $user->lieuNaissance =  $request->lieuNaissance;
                $user->password = Hash::make( $request->password);
                $user->save();
        } else {
            request()->validate([
                'prenom' => ['required', 'string', 'max:255'],
                'nom' => ['required', 'string', 'max:255'],
                'adresse' => ['required', 'string', 'max:255'],
                'tel' => ['required','string', 'max:9','min:9'],
                'genre' => ['required','string', ],
                'dateNaissance' => ['required', 'date'],
                'lieuNaissance' => ['required', 'string','min:3','max:100'],
                'email' => ['required', 'string', 'email', 'max:255','unique:users']
              ]);
    
    
                $user->nom = $request->nom;
                $user->prenom = $request->prenom;
                $user->tel =   $request->tel;
                $user->adresse =  $request->adresse;
                $user->genre =  $request->genre;
                $user->dateNaissance =  $request->dateNaissance;
                $user->lieuNaissance =  $request->lieuNaissance;
                $user->email = $request->email;
                $user->save();
        }
        return  redirect()->action('SupervisorsController@indexTeacher')->with('success','données professeur mis à jour');

    }

    public function classe_routineTeacher($id){
        $teacher = Teacher::findOrfail($id);

        return view('backend.'.Auth()->user()->role.'.teachers.class_routine',[
            'teacher' =>$teacher
        ]);
    }

    public function print_class_routineTeacher(Teacher $teacher){

        $pdf = PDF::loadView('backend.'.Auth()->user()->role.'.teachers.fichier',[
            'teacher'=> $teacher
          ])->setPaper('a5', 'landscape');

        return $pdf->Stream( 'EMPL_'.$teacher->user->prenom.''.$teacher->user->nom.'.pdf');
    }

    // ************* liste des redoublants*********//
    public function redoublants(){

        $redoublants = StudentRedouble::all();
 
        return view('backend.'.Auth()->user()->role.'.students.redoublant',[
            'redoublants' => $redoublants
        ]);
    }

    // ************* les classes et leurs unite et semestre *********//

    // liste des semestres
    public function  liste_des_semestre($id){
        $classe = Classe::findOrfail($id);

        return view('backend.'.Auth()->user()->role.'.classes.liste_semestre',compact('classe'));
    }
     // liste des unite et matiere
     public function  liste_des_unite_matiere($id){

        $semestre = Semester::findOrfail($id);

        return view('backend.'.Auth()->user()->role.'.classes.liste_unite_matiere',compact('semestre'));
    }


    //  liste des emplois du temps des professeurs 
    public function teacher_class_routine(){
       $class_routines = Class_routine::all();
       
       return view('backend.'.Auth()->user()->role.'.teachers.class_routine_index',[
           'class_routines' =>$class_routines
       ]);
    }



   
}
