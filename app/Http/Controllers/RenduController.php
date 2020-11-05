<?php

namespace App\Http\Controllers;

use App\Rendu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\DatabaseNotification;

class RenduController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rendus=Rendu::latest()->paginate(4);
        return view('admin.rendu.list',compact('rendus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.rendu.form');
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
            'titre'=> ['required','string'],
            'contenu'=> ['required','string'],
            'document'=> ['required','file','mimes:pdf,docx,xls','max:2048'],
          ]);
        $file=$request->file('document');
            $filename=time().'.'.$file->getClientOriginalName();
          $filePath=request('document')->storeAs('rapport',$filename, 'public');
        $rendu=Rendu::create([
            'titre'=>$request->titre,
            'contenu'=>$request->contenu,
            'document'=>$filePath,
            'user_id'=> Auth::user()->id
        ]); 
    return redirect()->back(); 
        // return redirect()->route('rendu.show', $rendu->id);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rendu  $rendu
     * @return \Illuminate\Http\Response
     */
    public function show(Rendu $rendu)
    {
       return view('admin.rendu.detail', compact('rendu'));
    }

    public function show_notification(Rendu $rendu , DatabaseNotification $notification)
    {
        $notification->markAsRead();
        
       return view('admin.rendu.detail', compact('rendu'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rendu  $rendu
     * @return \Illuminate\Http\Response
     */
    public function edit(Rendu $rendu)
    {
        $this->authorize('update', $rendu);
        return view('admin.rendu.edit', compact('rendu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rendu  $rendu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rendu $rendu)
    {
        $this->authorize('update', $rendu);
        $data=request()->validate([
            'titre'=> ['required','string'],
            'contenu'=> ['required','string'],
            'document'=> ['required','file','mimes:pdf,docx,xls','max:2048'],
          ]);
          if(request('document')){
              $filePath=request('document')->store('rendu','public');
              $rendu->update(array_merge($data,['document'=>$filePath]));
            }
            else{
              $rendu->titre=$request->titre;
              $rendu->contenu=$request->contenu;
              $rendu->save();
            }
        return redirect()->route('rendu.show', $rendu);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rendu  $rendu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rendu $rendu)
    { 
        $this->authorize('delete', $rendu);
        $rendu->delete();
        return redirect()->route('rendu.index', $rendu);
    }

    public function rendu()
    {
        $rendus=Rendu::latest()->paginate(4);
        return view('admin.rendu.rendu',compact('rendus'));
    }
    // public function download($rendu)
    // {
    //     return  response()->download($rendu);
    // }
}
