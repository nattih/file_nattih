@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <section class="content">
        <div class="container-fluid">
          <div class="container">
              @if(Session::has('message'))
              <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
               @endif
            <p class="text-center text-bold">Nouveau membre</p>
              <hr>
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="card">
                  <article class="card-body"> 
                    <form action="{{route('admin.users.store')}}" method="post"  enctype="multipart/form-data">
                      @csrf
                      <div class="form-row">
                        <div class="col form-group">
                          <label>Nom </label>   
                            <input type="text" class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="" value="{{ old('name') }}">
                              @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                        <div class="col form-group">
                          <label>Prénom(s)</label>
                          <input type="text" class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" placeholder="" value="{{ old('prenom') }}">
                            @error('prenom')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div> 
                      </div>  
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Sexe</label>
                          <select id="inputState" class="form-control custom-select @error('sexe') is-invalid @enderror" type="text" name="sexe" placeholder="" value="{{ old('sexe') }}">
                            <option> Choose...</option>
                              @foreach ($user->getSexeOptions() as $key=>$value)
                                <option value="{{$key}}"> {{$value}}</option>
                              @endforeach
                          </select>
                              @error('sexe')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                               @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label>Date et lieu de naissance</label>
                          <input type="date" class="form-control @error('dat_naiss') is-invalid @enderror" type="text" name="dat_naiss" placeholder="" value="{{ old('dat_naiss') }}">
                            @error('dat_naiss')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Lieu de résidence</label>
                          <input type="text" class="form-control @error('residence') is-invalid @enderror" type="text" name="residence" placeholder="" value="{{ old('residence') }}">
                            @error('residence')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label>Contact(s)</label>
                          <input type="text" class="form-control @error('contact') is-invalid @enderror" type="text" name="contact" placeholder="" value="{{ old('contact') }}">
                            @error('contact')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div> 
                      </div> 
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Departement</label>
                          <select id="inputState" class="form-control custom-select @error('departement_id') is-invalid @enderror" type="text" name="departement_id" placeholder="" value="{{ old('departement_id') }}">
                            <option> Choose...</option>
                            @foreach($dpts as $dpt)  
                            <option value="{{$dpt->id}}">{{$dpt->nom}}</option>
                        @endforeach
                          </select>
                            @error('departement_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label>Poste occupé</label>
                          <select id="inputState" class="form-control custom-select @error('poste_id') is-invalid @enderror" type="text" name="poste_id" placeholder="" value="{{ old('poste_id') }}">
                            <option> Choose...</option>
                            @foreach($postes as $poste)  
                            <option value="{{$poste->id}}">{{$poste->nom}}</option>
                        @endforeach
                          </select>
                              @error('poste_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                        </div>
                      </div> 
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Debut de fonction</label>
                          <input type="date" class="form-control @error('debut_fonction') is-invalid @enderror" type="text" name="debut_fonction" placeholder="" value="{{ old('debut_fonction') }}">
                            @error('debut_fonction')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label>Durée du contrat</label>
                          <input type="text" class="form-control @error('contrat') is-invalid @enderror" type="text" name="contrat" placeholder="" value="{{ old('contrat') }}">
                              @error('contrat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                        </div> 
                      </div> 
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Photo</label>
                          <input type="file" class="form-control @error('photo') is-invalid @enderror" type="text" name="photo" placeholder="" value="{{ old('photo') }}">
                              @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label>Email</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="" value="{{ old('email') }}">
                            @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div> 
                      </div> 
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Password</label>
                          <input type="password" class="form-control @error('password') is-invalid @enderror" type="text" name="password" placeholder="" value="{{ old('password') }}">
                            @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label>Password confirm</label>
                          <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" type="text" name="password_confirmation" placeholder="" value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div> 
                      </div> 
                      <div class="form-group float-right col-auto">
                        <button type="submit" class="btn btn-ntn btn-block">Ajouter</button>
                      </div>         
                    </form>
                  </article>  
                </div>  
              </div>  
            </div>  
          </div> 
        </div>
      </div>
@endsection
