<?php

namespace App\Http\Controllers;
use PDF;
use App\Event;
use App\Offre;
use App\Contact;
use App\Categorie;
use App\Exports\OffreExport;
use Illuminate\Http\Request;
use App\Exports\EmploiExport;
use App\Exports\MessageExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

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

    public function destroy_stage( Offre $offre){
        $offre->delete();
        return redirect()->back();
    }
    public function destroy_emploi( Offre $offre){
      $offre->delete();
      return redirect()->back();
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

    public function destroy_message(Contact $mg){
        $mg->delete();
        return redirect()->back();
      }
    // generer la liste en pdf

    public function createPDF() { 

        $data = Offre::where('offre', '=', 0)->get();
        view()->share('offres',$data);
        $pdf = PDF::loadView('admin.offre.pdf.stage', $data);
        return $pdf->download('stage_liste.pdf');
      }

      public function emploiPDF() { 

        $data = Offre::where('offre', '=', 1)->get();
        view()->share('offres',$data);
        $pdf = PDF::loadView('admin.offre.pdf.emploi', $data);
        return $pdf->download('emploi_liste.pdf');
      }


      public function messagePDF() { 

        $data = Contact::all();
        view()->share('mgs',$data);
        $pdf = PDF::loadView('admin.offre.pdf.message', $data);
        return $pdf->download('message_liste.pdf');
      }
// generer excel liste
      public function stageExport() 
      {
          return Excel::download(new OffreExport, 'stage_liste.xlsx');
      }  

      public function emploiExport() 
      {
          return Excel::download(new EmploiExport, 'emploi_liste.xlsx');
      }  

      public function messageExport() 
      {
          return Excel::download(new MessageExport, 'message_liste.xlsx');
      }  


}
  