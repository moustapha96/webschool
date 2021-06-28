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
        $marks = Mark::where('flag',true)->get();
        return view('backend.' . Auth::user()->role . '.marks.index', compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::where('flag',true)->get();
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

            foreach ($unities as $uni) {

                foreach ($uni->subject as $subject) {
                    array_push($matieres, $subject);
                }
            }
        }

        if ($matieres == null){
            return redirect()->back()->with('error','impossible d\'enregistrer une note pour cette étudiant ');    
        }
        $students = Student::all();
        return view('backend.' . Auth::user()->role . '.marks.create', compact('students', 'student', 'matieres'));
    }
   
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
        if ($annee_actuel == null) {
            return redirect()->action('MarkController@index')->with('error', ' l\'année académique n\'est pas encore activé ');
        }
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
   
    public function show(Mark $mark)
    {
        //
    }

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

            foreach ($unities as $uni) {

                foreach ($uni->subject as $subject) {
                    array_push($matieres, $subject);
                }
            }
        }
        return view('backend.' . Auth::user()->role . '.marks.edit', compact('mark', 'matieres'));
    }

    public function update(Request $request, Mark $mark)
    {
        request()->validate([
            'typeNote' => ['required'],
            'mark_value' => ['required']
        ]);

        $mark->typeNote = $request->typeNote;
        $mark->mark_value = $request->mark_value;
        $mark->save();

        return redirect()->action('MarkController@index')->with('success', 'note étudiant modifiée avec succès');
    }

    public function destroy(Mark $mark)
    {
        $mark->__delete();
        return redirect()->action('MarkController@index')->with('success', 'note étudiant supprimée');
    }


    public function students_liste()
    {

        $students = Student::where('flag',true)->get();

        return view('backend.' . Auth::user()->role . '.marks.index_student', [
            'students' => $students
        ]);
    }

    public function students_marks(Student $student)
    {

        $student->bulletin();

        $datas = json_decode($student->bulletin->data, true);

        return view('backend.' . Auth::user()->role . '.marks.notes', [
            'student' => $student,
            'datas' => $datas,
        ]);
    }
}
