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
        $student_attendances = Student_attendance::where('flag',true)->get();
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
        $students = Student::where('flag',true)->get();
        $classes = Classe::where('flag',true)->get();
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
       $classes = Classe::where('flag',true)->get();
       $students = Student::where('flag',true)->get();
        return view('backend.'. Auth::user()->role . '.student_attendances.edit', 
                compact('student_attendance','classes','students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student_attendance  $student_attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student_attendance $student_attendance)
    {
        
        $request->validate([
            'student_id'=>'required',
            'class_id'=>'required',
            'date'=>'required',
            'attendance'=>'required',
            ]);

           
            $student_attendance->student_id =  $request->get('student_id');
            $student_attendance->class_id =  $request->get('class_id');
            $student_attendance->date =  $request->get('date');
            $student_attendance->attendance =  $request->get('attendance');
            $student_attendance->save();
            return  redirect()->action('StudentAttendanceController@index')->with('success', 'absence mise à jour ');
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
        Student_attendance::where('id',$id)->__delete();
        return redirect()->action('StudentAttendanceController@index')->with('success', 'Student_attendance deleted!');
    }
}
