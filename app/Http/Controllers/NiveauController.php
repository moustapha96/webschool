<?php

namespace App\Http\Controllers;

use App\Models\niveau;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $niveaux = Niveau::where('flag',true)->get();
        return view('backend.'.Auth()->user()->role.'.niveau.index',[
            'niveaux' => $niveaux
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
            'name' => ['required', 'string', 'unique:niveaux'],
            'code' => ['required', 'string']
          ]);

        Niveau::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->back()->with('success','niveau '. $request->name .' bien ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\niveau  $niveau
     * @return \Illuminate\Http\Response
     */
    public function show(niveau $niveau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\niveau  $niveau
     * @return \Illuminate\Http\Response
     */
    public function edit(niveau $niveau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\niveau  $niveau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, niveau $niveau)
    {
        request()->validate([
            'name' => ['required', 'string', 'unique:book_categories'],
            'code' => ['required', 'string']
          ]);

        $niveau->name = $request->name;
        $niveau->code = $request->code;

        $niveau->save();

        return redirect()->back()->with('success','niveau mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\niveau  $niveau
     * @return \Illuminate\Http\Response
     */
    public function destroy(niveau $niveau)
    {
        $niveau->__delete();
        return redirect()->action('NiveauController@index')->with('success','niveau bien supprimée');
    }
}
