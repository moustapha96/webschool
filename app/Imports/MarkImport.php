<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Academic_year;
use App\Models\filiere;
use App\Models\Mark;
use App\Models\niveau;
use App\Models\Setting;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MarkImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
           
            $clas = explode(" ", $row["classe"]);
            $n = $clas[0];
            $f = $clas[1];

            /* traitement pour trouver la classe correspondant */
            $niveau = niveau::where("code", $n)->get()->first();
            $filiere = filiere::where('code', $f)->get()->first();

            $classe = DB::table('classes')
                ->where('filiere_id', '=', $filiere->id)
                ->where('niveau_id', '=', $niveau->id)
                ->get()->first();
            
            /* traitement pour trouver l'etudiant */
            $name = explode(" ", $row["student"]);
            $prenom = $name[0]; // piece1
            $nom = $name[1]; // piece2
            $user = DB::table('users')
                ->where('nom', '=', $nom)
                ->where('prenom', '=', $prenom)
                ->get()->first();
            $student = Student::where('user_id',$user->id)->first();
            
            /* traitement pour trouver la matiere */
            $matiere = DB::table('subjects')
                ->where('name', '=', $row["matiere"])
                ->get()->first();
            

            $annee = Setting::where('code', 'academic_year')->get()->first();
            $annee_actuel = Academic_year::where('year', $annee->value)->get()->first();

           
            return new Mark([
                'mark_value'  => $row['note'],
                'class_id' => $classe->id,
                'student_id'    => $student->id,
                'subject_id'  => $matiere->id,
                'typeNote' => $row["examdevoir"],
                'anneeAca_id' => $annee_actuel->id,
            ]);
        }
    }

    
}
