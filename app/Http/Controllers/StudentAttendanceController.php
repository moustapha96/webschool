<?php

namespace App\Http\Controllers;

use App\Models\Student_attendance;
use Illuminate\Http\Request;

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
        $student_attendance = Student_attendance::all();
        return view('backend.supervisor.student_attendances.index', compact('student_attendance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
        $student_attendance = Student_attendance::find($id);
        return view('backend.supervisor.student_attendances.edit', compact('student_attendance'));
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
        return redirect('/student_attendances')->with('success', 'Student_attendance deleted!');
    }
}
