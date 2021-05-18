<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Unitie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('backend.' . Auth()->user()->role . '.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unities = Unitie::all();
        return view('backend.' . Auth()->user()->role . '.subjects.create', compact('unities'));
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
            'name' => ['required'],
            'unity_id' => ['required'],
            'coefficient' => ['required'],
        ]);

        $subject = new Subject();

        $subject->name = $request->name;
        $subject->unity_id = $request->unity_id;
        $subject->coefficient = $request->coefficient;
        $subject->save();

        return redirect()->action('SubjectController@index')->with('success', 'matiere créer avec succcés');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $unities = Unitie::all();
        return view('backend.' . Auth()->user()->role . '.subjects.edit', compact('subject', 'unities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        request()->validate([
            'name' => ['required'],
            'unity_id' => ['required'],
            'coefficient' => ['required'],
        ]);

        $subject->name = $request->name;
        $subject->unity_id = $request->unity_id;
        $subject->coefficient = $request->coefficient;
        $subject->save();

        return redirect()->action('SubjectController@index')->with('success', 'matiere mise en jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {

        $subject->delete();
        return redirect()->action('SupervisorsController@listM')->with('success', 'matiere supprimée avec succés');
    }

    public function index_gestion(){
       return view('backend.'. Auth::user()->role.'.subjects.index_gestion');
    }
}
