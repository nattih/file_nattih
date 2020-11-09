<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Poste;

use App\Departement;
use App\CahierVisite;
use PDF;
use Illuminate\Http\Request;
use App\Exports\ArchiveExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
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
    //    $users= User::where('deleted_at', '=', 0)->get();
        return view('admin.users.index');
    }
    public function list_actif()
    {
       $users= User::where('deleted_at', '=', 1)->paginate(4);
        return view('admin.users.manager', compact('users'));
    }

    public function list_inactif()
    {
       $users= User::where('deleted_at', '=', 0)->paginate(4);
        return view('admin.users.archive', compact('users'));
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
        $data=request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'sexe' => ['required', 'integer'],
            'dat_naiss' => ['required', 'string'],
            'residence' => ['required', 'string'],
            'contact' => ['required', 'string', 'max:8'],
            'departement_id' => ['required', 'integer'],
            'poste_id' => ['required', 'integer'],
            'debut_fonction' => ['required', 'string'],
            'contrat' => ['required', 'string'],
            'photo' => ['required', 'image'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
          ]);

          $imagePath=request('photo')->store('uploads','public');
          $user= User::create([
              'name' => $data['name'],
              'prenom' => $data['prenom'],
              'sexe' => $data['sexe'],
              'dat_naiss' => $data['dat_naiss'],
              'residence' => $data['residence'],
              'contact' => $data['contact'],
              'departement_id' => $data['departement_id'],
              'poste_id' => $data['poste_id'],
              'debut_fonction' => $data['debut_fonction'],
              'contrat' => $data['contrat'],
              'photo' => $imagePath,
              'email' => $data['email'],
              'password' => Hash::make($data['password']),
          ]);
          // assigner un role utilisateur par defaut à les auttres inscription
        $role = Role::select('id')->where('name', 'agent')->first();
        $user->roles()->attach($role);
        Session::flash('message', 'Agent enregistré avec succes!'); 
        Session::flash('alert-class', 'alert-success text-center'); 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    //    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

       if (Gate::denies('edit-users')){ 

        return redirect()->route('');
       }

        $roles=Role::all();
        return view('admin.users.edit',[
            'user'=>$user,
            'roles'=>$roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();
        
        return redirect()->route('users.actif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function deleted_user(User $user)
    {
         

        if (Gate::denies('delete-users')){
            return redirect()->route('users.actif'); // on ne suprime pas les users tanq on est pas admin
           }
        // $user->roles()->detach();
        // $user->deleted_at=0;
        // $user->save();
        $user->deleted_at = 0;
        $user->save();
        // User::where('id', $user)->update(['deleted_at' => 0]);
        
        return redirect()->route('users.actif');
    }

    public function activer_user(User $user)
    {
        if (Gate::denies('delete-users')){
            return redirect()->route('users.inactif'); // on ne suprime pas les users tanq on est pas admin
           }
        $user->deleted_at = 1;
        $user->save();
        return redirect()->route('users.inactif');
    }
    public function archivePDF() { 

        $data = User::where('deleted_at', '=', 0)->get();
        view()->share('users',$data);
        $pdf = PDF::loadView('pdf.archive', $data);
        return $pdf->download('archive_personnel_liste.pdf');
      }

    public function archiveExport() 
      {
          return Excel::download(new ArchiveExport, 'archive_personnel_liste.xlsx');
      }  
}
