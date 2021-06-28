<?php

namespace App\Http\Controllers;

use App\Imports\MarkImport;
use App\Imports\StudentImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    public function import_student_mark()
    {
        return view('backend.admin.marks.import');
    }
    public function store_student_mark(Request $request)
    {

        // $request->validate([
        //     'fileToUpload' => 'required|file|max:2048|mimes:xls,xlsx',
        // ]);
        
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');
        Excel::import(new MarkImport, $file);

        return redirect()->back()->with('success', 'All data successfully imported!');

        /* Excel::import(new MarkImport, request()->file('file'))->store('excel_note');

        return back()->with('success', 'Excel Imported...'); */
    }


    public function ficheMarkStudent()
    {
    }
}
