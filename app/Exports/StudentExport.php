<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromArray, WithHeadings
{
   
    public function headings(): array
    {
        return [
            'INE', 'Nom', 'prenom', 'Address', 'email', 'tel', 'LieuNaissance', 'dateNaissance', 'niveau','filiere'
        ];
    }

    public function array(): array
    {
        $students = Student::all();
        $customer_array[] = array('INE', 'Nom', 'prenom', 'Address', 'email', 'tel', 'LieuNaissance', 'dateNaissance', 'niveau','filiere');
        foreach ($students as $student) {
            $customer_array[] = array(
                'INE' => $student->ine,
                'prenom'  => $student->user->prenom,
                'Nom'   => $student->user->nom,
                'Address'    => $student->user->adresse,
                'email'  => $student->user->email,
                'tel'   => $student->user->tel,
                'lieuNaissance'   => $student->user->lieuNaissance,
                'dateNaissance'   => $student->user->dateNaissance,
                'niveau'   => $student->classe->niveau->name,
                'filiere'   => $student->classe->filiere->name,
            );
        }
        return $customer_array;
    }

    
}
