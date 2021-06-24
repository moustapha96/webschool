<?php

namespace App\Exports;

use App\Models\Classe;
use Maatwebsite\Excel\Concerns\FromArray;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithProperties;

class ClasseExport implements FromArray, WithHeadings, WithProperties
{
    protected $classe;

    public function __construct(Classe $classe)
    {
        $this->classe = $classe;
    }
    public function properties(): array
    {
        return [
            'creator'        => 'webschool',
            'lastModifiedBy' => 'khouma',
            'title'          => 'liste classe:' . $this->classe->niveau->code . ' ' . $this->classe->filiere->name,
            'description'    => 'liste des étudiants de la classe',
            'subject'        => 'classe',
            'keywords'       => 'classe,export,excel',
            'category'       => 'Classe',
            'manager'        => 'Webschool',
            'company'        => 'www.webschool.com',
        ];
    }
    public function headings(): array
    {
        return [
            'INE', 'Nom', 'prenom', 'Address', 'email', 'tel', 'LieuNaissance', 'dateNaissance', 'niveau', 'filiere'
        ];
    }
    public function array(): array
    {

        $customer_array[] = array('INE', 'Nom', 'prenom', 'Address', 'email', 'tel', 'LieuNaissance', 'dateNaissance', 'niveau', 'filiere');
        foreach ($this->classe->student as $student) {
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
