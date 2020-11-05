<?php

namespace App\Http\Controllers\Admin;

use App\Departement;
use App\Http\Controllers\Controller;
use App\Poste;
use App\User;
use Illuminate\Http\Request;

class PersonnelsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::latest()->paginate(3);
         $dpts=Departement::latest()->get();
        return view('admin.departement.liste',compact('dpts','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $dpts=Departement::all();
        return view('admin.departement.form', compact('dpts'));
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
            'nom'=> ['required','string']
          ]);

        Departement::create([
            'nom'=>$request->nom,
        ]);     
        return redirect()->route('admin.dpts.create');
    }

    public function poste_store(Request $request)
    {
        request()->validate([
            'nom'=> ['required','string'],
            'departement_id'=> ['required','string']
          ]);

        Poste::create([
            'nom'=>$request->nom,
            'departement_id'=>$request->departement_id,
        ]);     
        return redirect()->route('register');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($dpt)
    {
        return view('admin.departement.detail', ['users'=>User::where('departement_id', '=', $dpt)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    
    public function pers_edit(User $user)
    {
        $dpts=Departement::all();
        $postes=Poste::all();
        return view('admin.departement.edit', compact('user','dpts','postes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function pers_update(Request $request, User $user)
    {
        $user->name=$request->name;
        $user->prenom=$request->prenom;
        $user->contact=$request->contact;
        $user->residence=$request->residence;
        $user->sexe=$request->sexe;
        $user->dat_naiss=$request->dat_naiss;
        $user->contrat=$request->contrat;
        $user->debut_fonction=$request->debut_fonction;
        $user->departement_id=$request->departement_id;
        $user->poste_id=$request->poste_id;
        $user->save();
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
