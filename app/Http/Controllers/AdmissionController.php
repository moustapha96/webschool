<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Admission_request;
use App\Models\Classe;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        $admission = Admission::all();
        return view('backend.supervisor.admissions.index', compact('admission'));
    }

    public function create()
    {
        //
        //liste des admissions resquests
        $admission_request  = Admission_request::all();
        return view('backend.supervisor.admissions.create', compact('admission_request',$admission_request));
    }


    public function validation(Request $request){
        $request->validate([
            'idAdmission_request'=>'required',
        ]);

        $admission = new Admission();

        $admission->idAdmission_request = $request->idAdmission_request;

        $admission->save();

         return redirect('/admissions')->with('success', 'Admission saved!');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'idAdmission_request'=>'required',
        ]);
        $admission = new Admission([
            'idAdmission_request' => $request->get('idAdmission_request'),

        ]);
        $admission->save();
        return redirect('/users.create')->with('success', 'Admission has been created!');


    }

    public function edit($id)
    {
        //
        $admission = Admission::find($id);
        return view('backend.supervisor.admissions.edit', compact('admission'));
    }

    public function update(Request $request,$id)
    {
        //
        $request->validate([
            'idAdmission_request'=>'required',
            ]);
            $admission =  Admission::find($id);
            $admission->idAdmission_request =  $request->get('idAdmission_request');
            $admission->save();
            return redirect('/admissions')->with('completed', 'Admission has been updated');
    }

    public function destroy($id)
    {
        //
        Admission::where('id',$id)->delete();
        return redirect('/admissions')->with('success', 'Admission deleted!');
    }


   


    
}
