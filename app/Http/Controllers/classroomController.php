<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\classroom;
use Illuminate\Support\Facades\Auth;

class classroomController extends Controller
{


    public function index()
    {
        $activeMain = "listeClassrooms";
        $title = 'Salles de classe';
        $classrooms = Classroom::where('flag',true)->get();
        return view('backend.' . Auth::user()->role . '.classrooms.index', compact('classrooms', 'title','activeMain'));
    }

    public function create()
    {
        $activeMain = "listeClassrooms";
        $title = 'Ajouter une Salle de classe';
        return view('backend.' . Auth::user()->role . '.classrooms.create', compact('title', 'activeMain'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required'],
            'description' => ['required'],
        ]);
        

        $classroom = new Classroom();

        $classroom->name = $request->name;
        $classroom->description = $request->description;

        Classroom::create($request->all());

        $messageSuccess = "La salle de classe a été créée avec succès.";
		return redirect()->action('classroomController@index')->with('messageSuccess', $messageSuccess);
    }
    public function list()
    {
        $dataC = Classroom::where('flag',true)->get();
        return view('backend.supervisor.classroom.list', compact('dataC'));
    }

    public function edit($id)
    {
        $activeMain = "listeClassrooms";
        $title = 'Modifier une salle de classe';

        $classroom = Classroom::where('id', $id)->first();
        return view('backend.' . Auth::user()->role . '.classrooms.edit', compact('classroom', 'title', 'activeMain'));
    }
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => ['required'],
            'description' => ['required'],
        ]);

        $classroom = Classroom::findOrFail($id);
        $classroom->update($request->all());

        $messageSuccess = "La salle de classe a été créée avec succès.";
		return redirect()->action('classroomController@index')->with('messageSuccess', $messageSuccess);
    }

    public function delete($id)
    {
        $classroom = Classroom::where('id', $id);
        $classroom->__delete();
        return redirect()->action('classroomController@index');
    }
}
