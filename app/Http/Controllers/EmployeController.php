<?php

namespace App\Http\Controllers;

use App\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EmployeEditRequest;
use App\Http\Requests\EmployeCreateRequest;


class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employes.index')->with('employes',Employe::paginate(3));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employes.create')->with('employe',new Employe());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeCreateRequest $request)
    {

       $activer_envoi=($request->has('activer_envoi'))?1:0;
       $photo=($request->has('photo'))?$request->photo->store('uploads','public'):'default/avatar.jpg';

       $employe=Employe::Create([
          'nom'=>$request->nom,
          'prenoms'=>$request->prenoms,
          'birth_date'=>$request->birth_date,
          'email'=>$request->email,
          'photo'=>$photo,
          'activer_envoi'=>$activer_envoi
       ]);
       return redirect()->route('employes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  view('employes.show')->with('employe',Employe::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('employes.create')->with('employe',Employe::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeEditRequest $request, $id)
    {
        $employe=Employe::find($id);

         $activer_envoi=($request->has('activer_envoi'))?1:0;

        if($request->has('photo')){
             /* Si ce n'est pas une image par defaut */
            if(! strpos($employe->photo,'avatar')){
                $tabs=explode("/",$employe->photo);   /* Spliter l'Url de l'image et prendre le dernier comme nom */
                Storage::delete("public/uploads/". end($tabs)); /* supprimer l'image */
            }

            $employe->photo=$request->photo->store('uploads','public');
         }

          $employe->nom=$request->nom;
          $employe->prenoms=$request->prenoms;
          $employe->birth_date=$request->birth_date;
          $employe->email=$request->email;
          $employe->activer_envoi=$activer_envoi;

          $employe->save();

          return redirect()->route('employes.index');
       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employe::destroy($id);
        return redirect()->back();
    }
}
