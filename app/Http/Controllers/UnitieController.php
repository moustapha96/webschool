<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Semester;
use App\Models\Unitie;
use Illuminate\Http\Request;

class UnitieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unities = Unitie::all();

        return  view('backend.' . Auth()->user()->role . '.unity.list', compact('unities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semesters = Semester::all();
        $classes = Classe::all();
        return  view('backend.' . Auth()->user()->role . '.unity.create', compact('semesters','classes'));
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
            'semestre_id' => ['required'],
            'credit' => ['required'],
            'class_id' => ['required'],
        ]);

        $unity = new Unitie();
        $unity->code = $request->code;
        $unity->name = $request->name;
        $unity->semester_id = $request->semestre_id;
        $unity->class_id = $request->class_id;
        $unity->credit = $request->credit;
        $unity->save();


        return redirect()->action('UnitieController@index')->with('success', 'unité d\'enseignement créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unitie  $unitie
     * @return \Illuminate\Http\Response
     */
    public function show(Unitie $unitie)
    {
        //
    }

    /** 
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unitie  $unitie
     * @return \Illuminate\Http\Response
     */
    public function edit(Unitie $unitie)
    {
        $semesters = Semester::all();
        $classes = Classe::all();
        return  view('backend.' . Auth()->user()->role . '.unity.edit', compact('unitie', 'semesters','classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unitie  $unitie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unitie $unitie)
    {
        request()->validate([
            'code' => ['required'],
            'name' => ['required'],
            'semestre_id' => ['required'],
            'credit' => ['required'],
            'classe_id' => ['required'],
        ]);

        $unitie->code = $request->code;
        $unitie->name = $request->name;
        $unitie->semester_id = $request->semestre_id;
        $unitie->class_id = $request->class_id;
        $unitie->credit = $request->credit;
        $unitie->save();

        return redirect()->action('UnitieController@index')->with('success', 'unité d\'enseignement mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unitie  $unitie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unitie $unitie)
    {
        $unitie->delete();

        return redirect()->action('SupervisorsController@indexU')->with('success', 'unité supprimé avec succès');
    }
}
