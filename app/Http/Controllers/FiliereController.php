<?php

namespace App\Http\Controllers;

use App\Models\filiere;
use App\Models\historical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filieres = Filiere::where('flag',true)->get();
        // $filieres = Filiere::all();
        return view('backend.'.Auth()->user()->role.'.filiere.index',[
            'filieres' => $filieres
        ]);
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
        request()->validate([
            'name' => ['required', 'string', 'unique:filieres'],
            'code' => ['required', 'string']
          ]);

        Filiere::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->back()->with('success','filiere '. $request->name .' bien ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function show(filiere $filiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function edit(filiere $filiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, filiere $filiere)
    {
        request()->validate([
            'name' => ['required', 'string', 'unique:book_categories'],
            'code' => ['required', 'string']
          ]);

        $filiere->name = $request->name;
        $filiere->code = $request->code;

        $filiere->save();

        return redirect()->back()->with('success','filiere mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(filiere $filiere)
    {
       
        $filiere->__delete();
        // $filiere->flag = false;
        // $filiere->save();
        // $historique = new historical();
        // $historique->user_id = Auth::user()->id;
        // $historique->object_name = 'filiere';
        // $historique->object_id = $filiere->id;
        // $historique->save();
        return redirect()->action('FiliereController@index')->with('success','filiere bien supprimée');
    }
}
