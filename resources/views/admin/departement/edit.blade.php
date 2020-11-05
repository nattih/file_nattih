{{-- @extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <section class="content">
        <div class="container-fluid">
            <div class="card d-flex justify-content-center">
                <div class="card-header d-flex justify-content-center">Modifier : <strong> {{$user->name}} {{$user->prenom}}</strong></div>
                    <div class="card-body">
                        <form action="{{route('pers.update', $user)}}" method="post">
                        @csrf
                        @method('PATCH')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label ">{{ __('Nom de l\'ulisateur') }}</label>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                                    value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="prenom" class="col-md-4 col-form-label ">{{ __('Prénom (s) ') }}</label>
                                <div class="col-md-12">
                                    <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" 
                                    value="{{ old('prenom') ?? $user->name }}" required autocomplete="name" autofocus>
                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cnib" class="col-md-4 col-form-label ">{{ __('cnib') }}</label>
                                <div class="col-md-12">
                                    <input id="cnib" type="text" class="form-control @error('cnib') is-invalid @enderror" name="cnib" 
                                    value="{{ old('cnib') ?? $user->name }}" required autocomplete="name" autofocus>
                                    @error('cnib')
                                        <span class="invalid-feedback" role="alert">
                                            strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contact" class="col-md-4 col-form-label ">{{ __('contact ') }}</label>
                                <div class="col-md-12">
                                    <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="cnib" 
                                    value="{{ old('contact') ?? $user->name }}" required autocomplete="name" autofocus>
                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label ">{{ __('Addresse E-Mail') }}</label>
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') ?? $user->email  }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-ntn">Modifier les informations</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>        
@endsection --}}

@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <section class="content">
        <div class="container-fluid">
          <div class="container">
            <div class="card-header d-flex justify-content-center">Modification de : <strong> {{$user->name}} {{$user->prenom}}</strong></div>
               
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="card">
                  <article class="card-body"> 
                    <form action="{{route('pers.update',$user)}}" method="post"  enctype="multipart/form-data">
                      @csrf
                      @method('PATCH')
                      <div class="form-row">
                        <div class="col form-group">
                          <label>Nom </label>   
                            <input type="text" class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="" value="{{ old('name')  ?? $user->name }}">
                              @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                        <div class="col form-group">
                          <label>Prénom(s)</label>
                          <input type="text" class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" placeholder="" value="{{ old('prenom')  ?? $user->prenom}}">
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
                                <option value="{{$key}}" {{$user->sexe == $value ? 'selected' : ''}}> {{$value}}</option>
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
                          <input type="date" class="form-control @error('dat_naiss') is-invalid @enderror" type="text" name="dat_naiss" placeholder="" value="{{ old('dat_naiss')  ?? $user->dat_naiss}}">
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
                          <input type="text" class="form-control @error('residence') is-invalid @enderror" type="text" name="residence" placeholder="" value="{{ old('residence')  ?? $user->residence}}">
                            @error('residence')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label>Contact(s)</label>
                          <input type="text" class="form-control @error('contact') is-invalid @enderror" type="text" name="contact" placeholder="" value="{{ old('contact')  ?? $user->contact }}">
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
                            <option value="{{$dpt->id}} " {{$user->departement_id == $dpt->id ? 'selected' : ''}}>{{$dpt->nom}}</option>
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
                            <option value="{{$poste->id}}" {{$user->poste_id == $poste->id? 'selected' : ''}}>{{$poste->nom}}</option>
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
                          <input type="date" class="form-control @error('debut_fonction') is-invalid @enderror" type="text" name="debut_fonction" placeholder="" value="{{old('debut_fonction') ?? $user->debut_fonction}}">
                            @error('debut_fonction')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label>Durée du contrat</label>
                          <input type="text" class="form-control @error('contrat') is-invalid @enderror" type="text" name="contrat" placeholder="" value="{{ old('contrat')  ?? $user->contrat}}">
                              @error('contrat')
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
