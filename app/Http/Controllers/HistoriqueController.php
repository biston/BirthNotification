<?php

namespace App\Http\Controllers;

use App\Employe;
use App\Historique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('historiques.index')->with('historiques',Historique::latest()->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){

        $request->validate([
            'motCle' => 'required',
        ]);

        $employes=Employe::where('employes.nom','like','%'.$request->motCle.'%')
                          ->OrWhere('employes.prenoms' ,'like','%'.$request->motCle.'%')
                          ->get()
                          ->pluck('id');

        $historiques=Historique::whereIn('employe_id',$employes)
                                ->paginate(10);

        return  view('historiques.index')->with('historiques',$historiques);
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
     * @param  \App\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function show(Historique $historique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function edit(Historique $historique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Historique $historique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historique $historique)
    {
        Historique::destroy($historique->id);
        return redirect()->back();
    }
}
