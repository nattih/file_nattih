<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
    $user=\auth()->user();
        return view('admin.profile.edit',compact('user'));
    }

    public function image_update(){
        $user=\auth()->user();
        
        if(request('photo')){
            $imagePath=request('photo')->store('uploads','public');
            $user->photo=$imagePath;
          }
        //   dd($user);
        // $user->email=request('email');
        // $user->password=request('password');
        $user->save();
        
        return back();
    }
    public function password(){
        $user=\auth()->user();
        $user->password=bcrypt(request('password'));
        $user->save();
        
        return back();
    }
}
