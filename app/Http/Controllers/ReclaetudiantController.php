<?php

namespace App\Http\Controllers;

use App\Models\Reclaetudiant;
use Illuminate\Http\Request;

class ReclaetudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reclaetudiants = Reclaetudiant::where('flag',true)->get();

        return view('backend.supervisor.reclaetudiants.index', compact('reclaetudiants'));

    }

    public function edit($id)
    {
         $reclaetudiant = Reclaetudiant::find($id);
         return view('backend.supervisor.reclaetudiants.edit', compact('reclaetudiant'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'idStudent'=>'required',
            'idRecla'=>'required',
            'commentaire'=>'required',
            ]);
            $reclaetudiant =  Reclaetudiant::find($id);
            $reclaetudiant->idStudent =  $request->get('idStudent');
            $reclaetudiant->idRecla =  $request->get('idClasse');
            $reclaetudiant->commentaire =  $request->get('commentaire');
            $reclaetudiant->save();
            return redirect('/reclaetudiants')->with('completed', 'Reclaetudiant has been updated');
    }

   
    public function destroy($id)
    {
     
        Reclaetudiant::where('id',$id)->__delete();
        return redirect('/reclaetudiants')->with('success', 'Reclaetudiant deleted!');
    }
}
