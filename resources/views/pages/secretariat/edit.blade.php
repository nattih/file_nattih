@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <div class="container-fluid">
        <div class="card">
          <h5 class="text-center"> Modification des information sur <strong>{{$cahier->nom}} {{$cahier->prenom}}</strong></h5> 
          <form class="border p-2" action="{{route('cahier.update',$cahier)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="nom">Nom</label>
                    <input id="nom" class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" placeholder="Entrer le nom" value="{{ old('nom') ?? $cahier->nom   }}">
                          @error('nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                  </div>
                  <div class="col-md-6">
                    <label for="prenom">Prénom(s)</label>
                    <input id="prenom" class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" placeholder="Entrer le prénom" value="{{ old('prenom') ?? $cahier->prenom }}">
                        @error('prenom')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="cenib">N° CNIB</label>
                    <input id="cnib" class="form-control @error('cnib') is-invalid @enderror" type="text" name="cnib" placeholder="Bxxxxxxxxx" value="{{ old('cnib') ?? $cahier->cnib   }}">
                        @error('cnib')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                  </div>
                  <div class="col-md-6">
                    <label for="contact">Contact(s)</label>
                    <input id="contact" class="form-control @error('contact') is-invalid @enderror" type="text" name="contact" placeholder="00226XXXXXXX" value="{{ old('contact') ?? $cahier->contact   }}">
                        @error('contact')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                </div>
            </div>
            <div class="form-group green-border-focus">
              <label for="exampleFormControlTextarea5">Motif de la visite</label>
              <textarea class="form-control @error('motif') is-invalid @enderror"   placeholder="Entrer le motif" id="motif" value="" rows="1" type="text" name="motif">{{ old('motif') ?? $cahier->motif }}</textarea>
                    @error('motif')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
              <label>Sexe</label>
              <select class="form-control custom-select  @error('genre') is-invalid @enderror" name="genre" value="{{ old('genre') ?? $cahier->genre  }}" >
                  @foreach ($cahier->getGenreOptions() as $key=>$value)
                    <option value="{{$key}}" {{$cahier->genre == $value ? 'selected' : ''}}> {{$value}}</option>
                  @endforeach
              </select>
              @error('genre')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
            </div>
          </div>
            <button type="submit" class="btn btn-ntn">Enregister</button>
          </form>
        </div>
      </div>
    </div>
@endsection


 