<?php

namespace App\Models;


use App\Model\Bulletin\Note;
use App\Model\Bulletin\Semestre;
use App\Model\Bulletin\Unite;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    
    protected $table = "students";

    public $fillable =['ine'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function book_issue(){
        return $this->hasMany(Book_issue::class,'student_id');
    }
    // un etudiant a plusieur notes
    
    public function mark(){
        return $this->hasMany(Mark::class,'student_id');
    }
    // un etudiant est dans une class
    public function classe(){
        return $this->belongsTo(Classe::class,'class_id');
    }

    public function parent(){
        return $this->belongsTo(Parents::class,'student_id');
    }
    
    public function student_file(){
        return $this->hasMany(Student_file::class,'student_id');
    }
    public function reclamationEtudiant(){
        return $this->hasMany(Reclaetudiant::class,'idStudent');
    }

    public function bulletin(){
        
            $student_collection = collect([]);
            $semestre_collection = collect([]);
           
            foreach ($this->classe->semester as $semester) {
 
                 $unite_collection = collect([]);
                 foreach ($semester->unitie as $unitie) {
                    $subject_collection = collect([]);
 
                    foreach ($unitie->subject as $subject) {
                         
                        $mark_collection = collect([]);
 
                        foreach ($subject->mark as $mark) {
 
                            if( $mark->student_id  ==  $this->id ){
                                 $mark_collection->put($mark->id,[
                                 'typeNote' => $mark->typeNote,
                                 'note' => $mark->mark_value,
                                 'matiere'=> $subject->name
                             ]); 

                            }
                            
                        }
 
                        $mo = $mark_collection->avg('note');
                        $point = $mo * $subject->coefficient;

                        $subject_collection->put($subject->id,[
                            'matiere' => $subject->name,
                            'moyenne_matiere' => $mo != 0 ?  round($mo, 2): 0,
                            'notes' => $mark_collection,
                            'coefficient' => $subject->coefficient
                        ]);
                          
                     }
             
                     $mo_u = $subject_collection->avg('moyenne_matiere');
                     $unite_collection->put($unitie->id,[
                        'unite' =>  $unitie->name,
                        'code' =>   $unitie->code,
                        'matiere'=> $subject_collection,
                        'moyenne_unite'=> $mo_u != 0 ? round($mo_u,2): 0 ,
                        'credit_obtenu' =>  $mo_u >= 10 ? $unitie->credit:0,
                        'credit_unite' => $unitie->credit,
                        'coefficient' => $subject_collection->sum('coefficient')
                    ]);
                 }
                 
                
                 $s_c = $unite_collection->sum('credit_obtenu');
                 $mo_semestre = $unite_collection->count() > 0 ? $unite_collection->sum('moyenne_unite')/$unite_collection->count() : 0;
                 
                 $semestre_collection->put($semester->id,[
                     'semestre' => $semester->name,
                     'unite' => $unite_collection,
                     'moyenne_semestre'=> $unite_collection->count() >0 ? $unite_collection->sum('moyenne_unite')/$unite_collection->count() : 0,
                     'credit_semestre' => $unite_collection->sum('credit_unite'), 
                     'credit_obtenu' =>  $s_c,
                     'coefficient_semestre' => $unite_collection->sum('coefficient')
                 ]);
            }
             $student_collection->put($this->id,[
                 'moyenne_annuel'=> $semestre_collection->avg('moyenne_semestre') ,
                 'total_credit' => $semestre_collection->sum('credit_obtenu'),
                 'semestre' => $semestre_collection,
             ]);

            $academic_year = Setting::where('code','academic_year')->get()->first();
            $annee_actuel = Academic_year::where('year',$academic_year->value)->get()->first();

            $clause_bulletin = ['student_id' => $this->id,
                                 'class_id' => $this->classe->id,
                                'academic_year_id' => $annee_actuel->id ];

            $bu = Bulletin::where($clause_bulletin)->get()->first();
           
            $apreciation = "";
             if($bu != null){

                $bu->average_student = $semestre_collection->avg('moyenne_semestre') != 0 ? $semestre_collection->avg('moyenne_semestre') : 0 ;
                $bu->average_classe = 0;
                $bu->credit = $semestre_collection->sum('credit_obtenu') != 0 ? $semestre_collection->sum('credit_obtenu') : 0;
                $bu->rang_student = 0;
                  
                $appreciation = $semestre_collection->sum('credit_obtenu');
                if( $appreciation < 42 ){
                    $bu->apreciation = 'Redoublé';
                }else if($appreciation < 60 ){
                    $bu->apreciation = 'Passage Conditionnel';
                }else{
                    $bu->apreciation = 'Passage en classe Supérieur';
                }
                $bu->data = $student_collection ;
                $bu->save();
                
               
             }else{

                 $bulletin = new Bulletin();
                 $bulletin->average_student = $semestre_collection->avg('moyenne_semestre') != 0 ? $semestre_collection->avg('moyenne_semestre') : 0 ;
                 $bulletin->average_classe = 0;
                 $bulletin->credit = $semestre_collection->sum('credit_obtenu') != 0 ? $semestre_collection->sum('credit_obtenu') : 0;
                 $bulletin->rang_student = 0;
                 $appreciation = $semestre_collection->sum('credit_obtenu');
                if( $appreciation < 42 ){
                    $bulletin->apreciation = 'Redoublé';
                }else if($appreciation < 60 ){
                    $bulletin->apreciation = 'Passage Conditionnel';
                }else{
                    $bulletin->apreciation = 'Passage en classe Supérieur';
                }
                 $bulletin->data = $student_collection ;
                 $bulletin->class_id = $this->classe->id;
                 $bulletin->student_id = $this->id;
                 $bulletin->academic_year_id = $annee_actuel->id;
                  
                 $bulletin->save();

                //  save in student_file table
                $setting = Setting::where('code','academic_year')->get()->first();

                $ay = Academic_year::where('year',$setting->value)->get()->first();

                 $student_file = new Student_file();
                 $student_file->student_id = $this->id;
                 $student_file->bulletin_id = $bulletin->id;  
                 $student_file->academic_year_id = $ay->id;  
                 $student_file->save();


                 if( $bulletin->credit < 42 ){
                     $etu_redoublant = new StudentRedouble();
                     $etu_redoublant->student_id = $this->id;
                     $etu_redoublant->class_id = $this->classe->id;
                     $etu_redoublant->academic_year_id = $ay->id; 
                     $etu_redoublant->save();
                 }

                
             }

             
           

            return $this->hasOne(Bulletin::class);
 
    }
   
   
}
