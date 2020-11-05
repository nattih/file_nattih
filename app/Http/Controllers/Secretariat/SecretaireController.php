<?php

namespace App\Http\Controllers\Secretariat;

use App\Cahier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecretaireController extends Controller
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
        $cahiers=Cahier::orderBy('created_at', 'desc')->paginate(8);
        return view('pages.secretariat.liste', compact('cahiers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {   $cahier=new Cahier();
        return view('pages.secretariat.visiteur',compact('cahier'));
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
            'nom'=> ['required','string','max:15'],
            'prenom'=> ['required','string'],
            'cnib'=> ['required','string','min:8'],
            'contact'=> ['required','string','min:8'],
            'motif'=> ['required','string'],
            'genre'=> ['required','integer'],
          ]);
        Cahier::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'cnib'=>$request->cnib,
            'contact'=>$request->contact,
            'motif'=>$request->motif,
            'genre'=>$request->genre,
            'user_id'=>Auth::user()->id
        ]);     
        return redirect()->route('cahier.index');     
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Cahier $cahierVisite
     * @return \Illuminate\Http\Response
     */
    public function show(Cahier $cahier)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cahier  $cahierVisite
     * @return \Illuminate\Http\Response
     */
    public function edit(Cahier $cahier)
    {
        return view('pages.secretariat.edit',[
            'cahier'=>$cahier
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cahier  $cahierVisite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cahier $cahier)
    {
        $cahier->nom=$request->nom;
        $cahier->prenom=$request->prenom;
        $cahier->cnib=$request->cnib;
        $cahier->motif=$request->motif;
        $cahier->contact=$request->contact;
        $cahier->genre=$request->genre;
        $cahier->save();
        return redirect()->route('cahier.index'); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cahier  $cahierVisite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cahier $cahier)
    {
        $cahier->delete();
        return redirect()->route('cahier.index'); 
    }
}
