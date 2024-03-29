<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Assign_subject;
use App\Models\Class_routine;
use App\Models\Classe;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassRoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class_routines = Class_routine::where('flag',true)->get();
        $assign_subjects = Assign_subject::where('flag',true)->get();
        return view('backend.'.Auth::user()->role .'.schedules.index', compact('class_routines','assign_subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::where('flag',true)->get();
        $classes = Classe::where('flag',true)->get();

        $classrooms = Classroom::where('flag',true)->get();
        $subjects = Subject::where('flag',true)->get();

        return view('backend.' . Auth()->user()->role . '.schedules.create',compact('teachers', 'classrooms', 'subjects', 'classes'));
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
            'classe_id' => ['required'],
            'classroom_id' => ['required'],
            'subject_id' => ['required'],
            'teacher_id' => ['required'],
            'day' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
        ]);

        // dd($request->all());
        $classRoutine = new Class_routine();

        $classRoutine->classe_id = $request->classe_id;
        $classRoutine->classroom_id = $request->classroom_id;
        $classRoutine->subject_id =  $request->subject_id;
        $classRoutine->teacher_id = $request->teacher_id;
        $classRoutine->day = $request->day;
        $classRoutine->start_time = $request->start_time;
        $classRoutine->end_time = $request->end_time;
        $classRoutine->save();

        $assign_subject = new Assign_subject();
        $assign_subject->subject_id = $request->subject_id;
        $assign_subject->teacher_id = $request->teacher_id;
        $assign_subject->save();

        return redirect()->action('ClassRoutineController@index')->with('success', 'emploi du temps créé avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Class_routine  $class_routine
     * @return \Illuminate\Http\Response
     */
    public function show(Class_routine $class_routine)
    {
        return view('backend.' . Auth::user()->role.'schedules.show',compact('class_routine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Class_routine  $class_routine
     * @return \Illuminate\Http\Response
     */
    public function edit(Class_routine $class_routine)
    {


        $classes = Classe::where('flag',true)->get();
        $classrooms = Classroom::where('flag',true)->get();
        $teachers = Teacher::where('flag',true)->get();

        $subjects = Subject::where('flag',true)->get();

        return view('backend.' . Auth()->user()->role . '.schedules.edit', [
            'class_routine' => $class_routine,
            'classes' => $classes,
            'classrooms' => $classrooms,
            'teachers' => $teachers,
            'subjects' => $subjects
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Class_routine  $class_routine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Class_routine $class_routine)
    {
        request()->validate([
            'classe_id' => ['required'],
            'classroom_id' => ['required'],
            'subject_id' => ['required'],
            'teacher_id' => ['required'],
            'day' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
        ]);
        // $class_routine = Class_routine::findOrFail($id);
        $class_routine->classe_id = $request->classe_id;
        $class_routine->classroom_id = $request->classroom_id;
        $class_routine->subject_id =  $request->subject_id;
        $class_routine->teacher_id = $request->teacher_id;
        $class_routine->day = $request->day;
        $class_routine->start_time = $request->start_time;
        $class_routine->end_time = $request->end_time;
        $class_routine->save();

        // $assign_subject = new Assign_subject();
        // $assign_subject->subject_id = $request->subject_id;
        // $assign_subject->teacher_id = $request->teacher_id;
        // $assign_subject->save();


        // $class_routine->update($request->all());

        return redirect()->action('ClassRoutineController@index')->with('success', 'emploi du temps mise en jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Class_routine  $class_routine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Class_routine $class_routine)
    {
        // $class_routines = Class_routine::where('id', $id);
        $class_routine->__delete();

        return redirect()->action('ClassRoutineController@index')->with('success','emploi du temps supprimé ');
    }

    public function getClasse(){
        $classes = Classe::where('flag',true)->get();
        return view('backend.' . Auth()->user()->role . '.schedules.schedule_classe',compact('classes'));
    }

    public function getProfesseur(){
        $teachers = Teacher::where('flag',true)->get();
        return view('backend.' . Auth()->user()->role . '.schedules.schedule_professeur',compact('teachers'));
    }

    public function classe(Request $request)
    {

        $code = $request->code;

        $classe = Classe::find($code);

        $class_routines = Class_routine::where('classe_id', $classe->id)->get();

        return view('backend.' . Auth::user()->role . '.schedules.classe', [
            'class_routines' => $class_routines,
            'classe' => $classe
        ]);
    }
    public function professeur(Request $request)
    {

        $teacher = Teacher::find($request->teacher_id);

        $class_routines = Class_routine::where('teacher_id', $teacher->id)->get();

        return view('backend.' . Auth::user()->role . '.schedules.professeur', [
            'class_routines' => $class_routines,
            'teacher' => $teacher
        ]);
    }

    public function printScheduleProfesseur(Teacher $teacher){


        if ($teacher != null) {
            $class_routines = Class_routine::where('teacher_id', $teacher->id)->get();

            $pdf = PDF::loadView('backend.' . Auth::user()->role . '.schedules.fileTeacher', [
                'class_routines' => $class_routines,
                'teacher' => $teacher
            ]);
            return $pdf->Stream('EMPL_' . $teacher->matricule . '.pdf');
        } else {
            return redirect()->back()->with('error','emploi du temps non imprimé ');
        }
    }

    public function printScheduleClasse(Classe $classe)
    {

        //$classe = Classe::where('code', $code)->get()->first();
        if ($classe != null) {
            $class_routines = Class_routine::where('classe_id', $classe->id)->get();

            $code = $classe->niveau->code.' '.$classe->filiere->code;

            $pdf = PDF::loadView('backend.' . Auth::user()->role . '.schedules.file', [
                'class_routines' => $class_routines,
                'code' => $code
            ]);
            return $pdf->Stream('EMPL_' . $classe->code . '.pdf');
        } else {
            return redirect()->back();
        }
    }
}
