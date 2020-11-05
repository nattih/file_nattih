<?php

namespace App\Http\Controllers\Finance;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinanceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function salarier()
    {

       $users= User::where('deleted_at', '=', 1)->paginate(4);
        return view('admin.users.salaire', compact('users'));
    }

    public function salaire_edit(User $user)
    {
         return view('admin.users.salaire_edit', compact('user'));
    }

    public function salaire_update(Request $request, User $user)
    {
        $user->salaire=$request->salaire;
        $user->save();
        return redirect()->route('users.salaire');
    }
}
