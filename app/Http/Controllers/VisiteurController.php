<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Categorie;
use App\Contact;
use App\Event;
use App\Offre;
use Illuminate\Http\Request;

class VisiteurController extends Controller
{
    public function index()
    {
        $offre=new Offre();
        $categori=Categorie::where('nom', '=' ,'VISITEUR')->first();
        $events=Event::where('categorie_id', '=', $categori->id)->get();
        return view('visiteurs.index',compact('events','offre'));
    }

    public function offre_store(Request $request)
    {
        request()->validate([
            'offre'=> ['required','integer'],
            'nom'=> ['required','string'],
            'motif'=> ['required','string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'dossier'=> ['required','file','mimes:pdf','max:2048'],
          ]);
        $file=$request->file('dossier');
            $filename=time().'.'.$file->getClientOriginalName();
          $filePath=request('dossier')->storeAs('offre',$filename, 'public');
        Offre::create([
            'offre'=>$request->offre,
            'nom'=>$request->nom,
            'motif'=>$request->motif,
            'email'=>$request->email,
            'dossier'=>$filePath,
        ]); 
        Session::flash('message', 'Votre offre a été transmise, merci pour la confiance!'); 
        Session::flash('alert-class', 'alert-primary text-center'); 
    return redirect()->back(); 
    }

    public function emploi()
    {
       $offres= Offre::where('offre', '=', 1)->paginate(4);
        return view('admin.offre.emploi', compact('offres'));
    }

    public function stage()
    {
       $offres= Offre::where('offre', '=', 0)->paginate(4);
        return view('admin.offre.stage', compact('offres'));
    }
    //formualire de contact

    public function contact_store(Request $request)
    {
        request()->validate([
            'nom'=> ['required','string'],
            'objet'=> ['required','string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'message'=> ['required','string'],
          ]);
        Contact::create($request->all());
        Session::flash('message', 'Votre message a été transmis, merci de nous etre fidele!'); 
        Session::flash('alert-class', 'alert-primary text-center'); 
        return redirect()->back();
        
    }
    public function message()
    {
       $mgs=  Contact::latest()->paginate(4);
        return view('admin.offre.contact', compact('mgs'));
    }
}
