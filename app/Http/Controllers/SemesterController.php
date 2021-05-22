<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semester::all();
        return view('backend.'.Auth()->user()->role.'.semester.index',compact('semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::all();
        return view('backend.'.Auth()->user()->role.'.semester.create',[
            'classes'=>$classes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'code' => ['required'],
            'name' => ['required'],
            'class_id' => ['required'],
        ]);

        $semester = new Semester();

        $semester->code = $request->code;
        $semester->name = $request->name;
        $semester->class_id = $request->class_id;

        $semester->save();

        return redirect()->action('SemesterController@index')->with('success','semestre créer avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(Semester $semester)
    {
        $classes = Classe::all();
        return view('backend.'.Auth()->user()->role.'.semester.edit',compact('semester','classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semester $semester)
    {
        request()->validate([
            'code'=>['required'],
            'name'=>['required'],
            'class_id'=>['required'],
        ]);

        $semester->name = $request->name;
        $semester->code = $request->code;
        $semester->class_id = $request->class_id;

        $semester->save();

        return redirect()->action('SemesterController@index')->with('success','semestre mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semester $semester)
    {
        $semester->delete();
        return redirect()->action('SemesterController@index')->with('success','semestre supprimer avec succes');
    }

    //liste des semestres d'une class
    public function ClasseSemester(Classe $classe){
        return view('backend.'.Auth::user()->role.'.semester.classe_semester',compact('classe'));
    }

    //liste des unités d'un semestre

    public function SemesterUnitie(Semester $semestre){
        return view('backend.'.Auth::user()->role.'.unity.semester_unity',compact('semestre'));
    }
}
