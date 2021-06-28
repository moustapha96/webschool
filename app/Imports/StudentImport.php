<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        

        return  tab([
            'INE'  => $row[0],
            'prenom'  => $row[1],
            'Nom'   => $row[2],
            'Address'    => $row[3],
            'email'   => $row[4],
            'tel'    => $row[5],
            'lieuNaissance'   => $row[6],
            'dateNaissance'    => $row[7],
            'niveau'   => $row[8],
            'filiere'   => $row[9],

        ]);
    }
}
