<?php

namespace App\Http\Controllers\Communication;

use App\User;
use App\Event;
use App\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $categori=Categorie::where('nom', '=','BUREAU')->first();
        $events=Event::where('categorie_id', '=', $categori->id)->orderBy('created_at', 'desc')->paginate(2);
        return view('pages.events.salon.pub',compact('events'));
    }

    // public function event_all()
    // {
    //     $users=User::latest()->paginate(3);
         
    //     return view('admin.departement.liste',compact('dpts','users'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Categorie::all();
        return view('pages.events.form', compact('categories'));
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
            'categorie_id'=> ['required','integer'],
            'description'=> ['required','string'],
            'image'=> ['required','image'],
          ]);
          $imagePath=request('image')->store('uploads','public');
        Event::create([
            'titre'=>$request->titre,
            'categorie_id'=>$request->categorie_id,
            'description'=>$request->description,
            'image'=>$imagePath,
            'user_id'=> Auth::user()->id
        ]); 
        return redirect()->route('events.create');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        // $user=Auth::all();
        return view('pages.events.voir', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $categories=Categorie::all();
        return view('pages.events.edit', compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $data=request()->validate([
            'titre'=> ['required','string'],
            'categorie_id'=> ['required','integer'],
            'description'=> ['required','string'],
            'image'=> ['required','image'],
          ]);
        $categories=Categorie::all();
        if(request('image')){
            $imagePath=request('image')->store('uploads','public');
            $event->update(array_merge($data,['image'=>$imagePath]));
          }
          else{
        
            $event->titre=$request->titre;
            $event->categorie_id=$request->categorie_id;
            $event->description=$request->description;
            $event->save();
          }
          return redirect()->route('events.show',$event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        // Storage::delete('public/storage/'.$event->image);
        $event->delete();
        return redirect()->back();
    }
}
