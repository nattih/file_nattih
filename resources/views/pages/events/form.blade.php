@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <div class="container-fluid">
        <div class="card">
              <b>
                <h5 class="text-center text-bold">Ajouter un evenement</h5>
                <a class="btn btn-success float-right" href="{{route('categories.create')}}">aujoter une categorie</a>
              </b> <br>
              <form class="border p-4" action="{{route('events.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="">
                  <label for="titre">Entrez le titre</label>
                  <input id="titre" class="form-control @error('titre') is-invalid @enderror" type="text" name="titre" placeholder="" value="{{ old('titre') }}">
                      @error('titre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
              </div>
                <div class="form-group">
                  <label>Entrez la categorie</label>
                  <select class="form-control custom-select @error('categorie_id') is-invalid @enderror" name="categorie_id" value="{{ old('categorie_id') }}" >
                    <option >choisir une categorie</option>
                    @foreach($categories as $categorie)  
                        <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                    @endforeach
                  </select>
                  @error('categorie_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                </div>
                <div class="form-group green-border-focus">
                  <label for="exampleFormControlTextarea5">entrez la description</label>
                  <textarea class="form-control @error('description') is-invalid @enderror"   placeholder=" " id="description"  rows="3" type="text" name="description">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <div class="">
                  <label for="image">Entrez l'image</label>
                  <input id="image" class="form-control @error('image') is-invalid @enderror" type="file" name="image" placeholder=" " value="{{ old('image') }}">
                      @error('image')
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


 