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
        $classes = Classe::where('flag',true)->get();

        $title = 'Liste des classes';
        $activeMain = 'listeClasses';


        $salles  = Classroom::where('flag',true)->get();
        $filieres = filiere::where('flag',true)->get();
        $niveaux = niveau::where('flag',true)->get();
        return  view('backend.'.Auth::user()->role.'.classes.index', compact('classes', 'title', 'activeMain', 'salles', 'filieres', 'niveaux'));
    }

    function admin_store(Request $request)
    {
        request()->validate([
            'classroom_id' => ['required'],
            'niveau_id' => ['required'],
            'filiere_id' => ['required']
        ]);

        $filiere = Filiere::find($request->filiere_id)->get();
        $classroom = Filiere::find($request->classroom_id)->get();
        $niveau = Filiere::find($request->niveau_id)->get();
        dump($filiere);
        dump($niveau);
        dump($classroom);

        $classe = new Classe();
        $classe->filiere_id = $request->filiere_id;
        $classe->niveau_id = $request->niveau_id;
        $classe->classroom_id = $request->classroom_id;
        $classe->save();

        return redirect()->action('ClassesController@index')->with('success','opération réussie avec succès');
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

    // public function create()
    // {
    //     return  view('backend.admin.classes.create');
    // }

    public function store(Request $request)
    {
        request()->validate([
            'classroom_id' => ['required'],
            'niveau_id' => ['required'],
            'filiere_id' => ['required']
        ]);

        $classe = new Classe();
        $classe->filiere_id = $request->filiere_id;
        $classe->niveau_id = $request->niveau_id;
        $classe->classroom_id = $request->classroom_id;
        $classe->save();

        return redirect()->action('ClassesController@index')->with('success','opération réussie avec succès');
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

    public function update(Request $request, Classe $classe)
    {
        request()->validate([
            'classroom_id' => ['required'],
            'niveau_id' => ['required'],
            'filiere_id' => ['required']
        ]);

        // $classe->filiere_id = $request->filiere_id;
        // $classe->niveau_id = $request->niveau_id;
        // $classe->classroom_id = $request->classroom_id;

        $classe->update($request->all());


        return redirect()->action('ClassesController@index')->with('success','opération réussie avec succès');
    }

    public function destroy($id)
    {
        $classe = Classe::where('id', $id);
        $classe->__delete();

        return redirect()->action('ClassesController@index')->with('success','opération réussie avec succès');
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
        $classes = Classe::where('flag',true)->get();

        return view('backend.supervisor.classes.list_classe', compact('classes'));
    }
    public function edit1($id)
    {

        $classe = Classe::where('id', $id)->first();
        $classrooms = Classroom::where('flag',true)->get();

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
        $classe->__delete();

        return redirect()->action('ClassesController@index1');
    }





    // liste des étudiants d'une classe

    public function ClasseStudent(Classe $classe)
    {
        return view('backend.' . Auth::user()->role . '.students.student_classe', compact('classe'));
    }
}
