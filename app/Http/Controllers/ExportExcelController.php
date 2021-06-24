<?php

namespace App\Http\Controllers;

use App\Exports\ClasseExport;
use App\Exports\StudentExport;
use App\Models\Classe;
use App\Models\Student;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class ExportExcelController extends Controller
{

    function index()
    {
        $students = Student::all();
        return view('export_excel')->with('customer_data', $students);
    }

    //export liste students
    public function export_student_exel()
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }
    public function export_student_pdf()
    {
        return Excel::download(new StudentExport, 'liste-étudiants.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
    public function export_classe_excel(Classe $classe)
    {
        $nom  = $classe->niveau->code.".-.".$classe->filiere->name;
        return Excel::download(new ClasseExport($classe), $nom.'.xlsx');
    }
    public function export_classe_pdf(Classe $classe)
    {
        $nom  = $classe->niveau->code.".-.".$classe->filiere->name ;
        return Excel::download(new ClasseExport($classe), $nom.'.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }

    function excel()
    {
        $students = Student::all();
        $customer_array[] = array('Nom', 'prenom', 'Address', 'tel', 'LieuNaissance', 'dateNaissance', 'email', 'niveau', 'filiere');
        foreach ($students as $student) {
            $customer_array[] = array(
                'prenom'  => $student->user->prenom,
                'Nom'   => $student->user->nom,
                'Address'    => $student->user->adresse,
                'email'  => $student->user->email,
                'lieuNaissance'   => $student->user->lieuNaissance,
                'dateNaissance'   => $student->user->dateNaissance,
                'niveau'   => $student->classe->niveau->name,
                'filiere'   => $student->classe->filiere->name,
                'tel'   => $student->user->tel
            );
        }
        Excel::create('Customer Data', function ($excel) use ($customer_array) {
            $excel->setTitle('liste des étudiants');
            $excel->sheet('Customer Data', function ($sheet) use ($customer_array) {
                $sheet->fromArray($customer_array, null, 'A1', false, false);
            });
        })->download('xlsx');
    }
}
