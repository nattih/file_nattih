<?php

namespace App\Http\Controllers\Auth;

use App\Departement;
use App\Http\Controllers\Controller;
use App\Poste;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showRegistrationForm()
    {
        $user=new User();
        $dpts=Departement::all();
        $postes=Poste::all();
        return view('auth.register',compact('dpts','postes','user'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'prenom' => ['required', 'string', 'max:255'],
    //         'sexe' => ['required', 'integer'],
    //         'dat_naiss' => ['required', 'string'],
    //         'residence' => ['required', 'string'],
    //         'contact' => ['required', 'string', 'max:8'],
    //         'departement_id' => ['required', 'integer'],
    //         'poste_id' => ['required', 'integer'],
    //         'debut_fonction' => ['required', 'string'],
    //         'contrat' => ['required', 'string'],
    //         'photo' => ['required', 'image'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {

    //     $imagePath=request('photo')->store('uploads','public');
    //     $user= User::create([
    //         'name' => $data['name'],
    //         'prenom' => $data['prenom'],
    //         'sexe' => $data['sexe'],
    //         'dat_naiss' => $data['dat_naiss'],
    //         'residence' => $data['residence'],
    //         'contact' => $data['contact'],
    //         'departement_id' => $data['departement_id'],
    //         'poste_id' => $data['poste_id'],
    //         'debut_fonction' => $data['debut_fonction'],
    //         'contrat' => $data['contrat'],
    //         'photo' => $imagePath,
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);

    //     // assigner un role utilisateur par defaut à les auttres inscription
    //     $role = Role::select('id')->where('name', 'agent')->first();
    //     $user->roles()->attach($role);
    //     return $user;
    // } 
    // protected function redirectTo()
    // {
    //     $this->guard()->logout();
    //     return redirect()->back();
    // }
}
