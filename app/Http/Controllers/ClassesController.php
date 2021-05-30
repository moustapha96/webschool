<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Classroom;
use App\Models\filiere;
use App\Models\niveau;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class ClassesController extends Controller
{

    public function index()
    {
        $classes = Classe::latest()->get();
        $title = 'Liste des classes';
        $activeMain = 'listeClasses';

        $salles  = Classroom::all();
        $filieres = filiere::all();
        $niveaux = niveau::all();
        return  view('backend.admin.classes.index', compact('classes', 'title', 'activeMain', 'salles', 'filieres', 'niveaux'));
    }

    function admin_store(Request $request)
    {
        request()->validate([
            'salle_id' => ['required'],
            'niveau_id' => ['required'],
            'filiere_id' => ['required']
        ]);
        $salle = Classroom::find($request->salle_id);
        $filiere = filiere::find($request->filiere_id);
        $niveau = niveau::find($request->niveau_id);

        dump($salle);
        dump($filiere);
        dump($niveau);
    }

    /*function classeslist(Request $request)

    {

        if ($request->ajax()) {
            $data = Classe::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }*/

    public function create()
    {
        return  view('backend.admin.classes.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'nameClasse' => ['required'],
            'niveau' => ['required'],
        ]);

        Classe::create($request->all());


        return redirect()->action('ClassesController@index');
    }

    public function show($id)
    {
        $classe = Classe::findOrFail($id);

        return response()->json($classe);
    }
    public function edit($id)
    {
        $classe = Classe::where('id', $id)->first();

        return  view('backend.admin.classes.edit', compact('classe'));
    }
    public function update(Request $request, $id)
    {
        request()->validate([
            'nomClasse' => ['required'],
            'niveau' => ['required'],
        ]);


        $classe = Classe::findOrFail($id);
        $classe->update($request->all());


        return redirect()->action('ClassesController@index');
    }

    public function destroy($id)
    {
        $classe = Classe::where('id', $id);
        $classe->delete();

        return redirect()->action('ClassesController@index');
    }




    // partie péna 

    // ***************************************fonction Supervisor nom Function+1  ex: index1******************************************************************* 

    public function index1()
    {

        return redirect()->action('ClassesController@list1');
    }

    public function create1()
    {
        return  view('backend.supervisor.classes.create_classe');
    }
    public function store1(Request $request)
    {
        request()->validate([

            'nameClass' => ['required'],
            'code' => ['required'],
        ]);

        $classes = new Classe();

        $classes->nameClass = $request->nameClass;
        $classes->code = $request->code;

        Classe::create($request->all());


        return redirect()->action('ClassesController@index1');
    }
    public function list1()
    {
        $classes = Classe::all();

        return view('backend.supervisor.classes.list_classe', compact('classes'));
    }
    public function edit1($id)
    {

        $classe = Classe::where('id', $id)->first();
        $classrooms = Classroom::all();

        return  view('backend.supervisor.classes.edit_classe', [
            'classe' => $classe,
            'classrooms' => $classrooms
        ]);
    }
    public function update1(Request $request, $id)
    {

        request()->validate([
            'nameClass' => ['required'],
            'code' => ['required'],
        ]);

        $classe = Classe::findOrFail($id);
        $classe->nameClass = $request->nameClass;
        $classe->code = $request->code;
        $classe->save();

        return redirect()->route('classes1.index1')->with('success', 'Classe mis à jour avec succés');
    }
    public function destroy1($id)
    {
        $classe = Classe::where('id', $id);
        $classe->delete();

        return redirect()->action('ClassesController@index1');
    }





    // liste des étudiants d'une classe

    public function ClasseStudent(Classe $classe)
    {
        return view('backend.' . Auth::user()->role . '.students.student_classe', compact('classe'));
    }

    
}
