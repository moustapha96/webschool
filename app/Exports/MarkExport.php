<?php

namespace App\Exports;

use App\Models\Mark;
use Maatwebsite\Excel\Concerns\FromArray;

class MarkExport implements FromArray
{


    public function array(): array
    {
        $marks = Mark::all();
        $customer_array[] = array('Note', 'Classe', 'student', 'matiere', 'exam/devoir');
        foreach ($marks as $mark) {
            $customer_array[] = array(
                'Note' => $mark->mark_value,
                'classe'  => $mark->subject->unitie->semester->classe->niveau->code . ' ' . $mark->subject->unitie->semester->classe->filiere->code,
                'student'   => $mark->student->user->prenom . ' ' . $mark->student->user->nom,
                'matiere'    => $mark->subject->name,
                'exam/devoir'  => $mark->typeNote,
            );
        }

        return $customer_array;
    }
}
