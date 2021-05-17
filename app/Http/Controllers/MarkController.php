<?php

namespace App\Http\Controllers;

use App\Models\Academic_year;
use App\Models\Classe;
use App\Models\Mark;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Unitie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Mark::all();
        return view('backend.' . Auth::user()->role . '.marks.index', compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $matieres = null;
        return view('backend.' . Auth()->user()->role . '.marks.create', compact('students', 'matieres'));
    }
    public function getSubjects(Request $request)
    {   

        $matieres = [];
        $student = Student::find($request->student_id);
        $uni = new Collection();
        // dump($student->classe->semester);
        foreach ($student->classe->semester as $semester) {
             $clause = [
                'semester_id' => $semester->id,
            ];
            $uni = Unitie::where($clause)->get();
            $unities =  $uni;

            foreach ($unities as $uni){
           
                foreach ($uni->subject as $subject){
                    array_push($matieres,$subject);
                }
            }
        }
      
        dump($matieres);
        $students = Student::all();
         return view('backend.'.Auth::user()->role.'.marks.create',compact('students','student','matieres'));
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
            'typeNote' => ['required'],
            'student_id' => ['required'],
            'mark_value' => ['required'],
            'subject_id' => ['required'],
        ]);
        $academic_year = Setting::where('code', 'academic_year')->get()->first();
        $annee_actuel = Academic_year::where('year', $academic_year->value)->get()->first();
        $student = Student::find($request->student_id)->first();
        $classe = $student->classe;
        $clause = [
            'student_id' => $request->student_id,
            'anneeAca_id' => $annee_actuel->id,
            'subject_id' => $request->subject_id,
        ];
        $marks = Mark::where($clause)->get();
        if ($marks != null && $marks->count() >= 2) {

            $cl = [
                'student_id' => $request->student_id,
                'anneeAca_id' => $annee_actuel->id,
                'subject_id' => $request->subject_id,
                'typeNote' => 'Examen'
            ];
            $m_examen = Mark::where($cl)->get()->first();

            if ($m_examen != null) {
                return redirect()->back()->with('error', 'ce étudiant a déja une note examen');
            }

            return redirect()->back()->with('error', 'ce étudiant a déja 2 notes');
        }

        $mark = new Mark();
        $mark->subject_id = $request->subject_id;
        $mark->mark_value = $request->mark_value;
        $mark->typeNote = $request->typeNote;
        $mark->student_id = $request->student_id;
        $mark->class_id = $classe->id;
        $mark->anneeAca_id = $annee_actuel->id;
        $mark->save();

        return redirect()->action('MarkController@index')->with('success', 'note étudiant bien enregistrer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function show(Mark $mark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function edit(Mark $mark)
    {

        $matieres = [];
        $student = Student::find($mark->student_id);
        $uni = new Collection();
      
        foreach ($student->classe->semester as $semester) {
             $clause = [
                'semester_id' => $semester->id,
            ];
            $uni = Unitie::where($clause)->get();
            $unities =  $uni;

            foreach ($unities as $uni){
           
                foreach ($uni->subject as $subject){
                    array_push($matieres,$subject);
                }
            }
        }
        return view('backend.' . Auth::user()->role . '.marks.edit', compact('mark','matieres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mark $mark)
    {
        request()->validate([
            'typeNote' => ['required'],
            'mark_value' => ['required']
        ]);

        $mark->typeNote = $request->typeNote;
        $mark->mark_value = $request->mark_value;
        $mark->save();

        return redirect()->action('MarkController@index')->with('success', 'note étudiant modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $mark)
    {
        $mark->delete();
        return redirect()->action('MarkController@index')->with('success', 'note étudiant supprimé');
    }
}
