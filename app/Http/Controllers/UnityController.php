<?php

namespace App\Http\Controllers;

use App\Models\Unity;
use App\Models\Semester;
use App\Models\Classe;
use App\Models\Unitie;
use Illuminate\Http\Request;

class UnityController extends Controller
{
 
    public function index()
    {
        $classes = Classe::all();
        return view('backend.supervisor.unities.index', compact('classes'));
    }

 
    public function show(Unitie $unity)
    {
        return view('backend.supervisor.unities.show', compact('unity'));
    }

    public function edit($id)
    {
        //
        $unity= Unitie::find($id);
        $semester = Semester::all();
        $classe = Classe::all();
        return view('backend.supervisor.unities.edit', compact('unity','semester','classe',$semester, $classe));

    }

    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'class_id' => 'required',
            'semestre_id' => 'required'
            ]);
            $unity =  Unitie::find($id);
            $unity->code =  $request->get('code');
            $unity->name =  $request->get('name');
            $unity->class_id =  $request->get('class_id');
            $unity->semestre_id =  $request->get('semestre_id');
            $unity->save();
            return redirect('/unities')->with('completed', 'Unity has been updated');
    }

    public function destroy($id)
    {
        Unitie::where('id',$id)->delete();
        return redirect('/unitiess')->with('success', 'Unity deleted!');
    }
}
