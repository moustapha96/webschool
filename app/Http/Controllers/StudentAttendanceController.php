<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Student;
use App\Models\Student_attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $student_attendances = Student_attendance::all();
        // foreach ($student_attendances as $a){
        //     dump($a->student);
        // }
        // dd();
        return view('backend.'. Auth::user()->role . '.student_attendances.index', compact('student_attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $classes = Classe::all();
        return view('backend.'. Auth::user()->role . '.student_attendances.create',compact('students', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'student_id'=>'required',
            'class_id'=>'required',
            'date'=>'required',
            'attendance'=>'required',
            ]);
            $student_attendance = new Student_attendance();
            $student_attendance->student_id = $request->get('student_id');
            $student_attendance->class_id =  $request->get('class_id');
            $student_attendance->date =  $request->get('date');
            $student_attendance->attendance = 1;
            $student_attendance->save();
            return redirect()->action('StudentAttendanceController@index')->with('completed', 'absence créé avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student_attendance  $student_attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Student_attendance $student_attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student_attendance  $student_attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Student_attendance $student_attendance)
    {
        //
       
        return view('backend.'. Auth::user()->role . '.student_attendances.edit', compact('student_attendance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student_attendance  $student_attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'idStudent'=>'required',
            'idClasse'=>'required',
            'date'=>'required',
            'commentaire'=>'required',
            ]);
            $student_attendance =  Student_attendance::find($id);
            $student_attendance->idStudent =  $request->get('idStudent');
            $student_attendance->idClasse =  $request->get('idClasse');
            $student_attendance->date =  $request->get('date');
            $student_attendance->commentaire =  $request->get('commentaire');
            $student_attendance->save();
            return redirect('/student_attendances')->with('completed', 'Student_attendancet has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student_attendance  $student_attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Student_attendance::where('id',$id)->delete();
        return redirect()->action('StudentAttendanceController@index')->with('success', 'Student_attendance deleted!');
    }
}
