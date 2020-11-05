@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <div class="container-fluid">
        <div class="card">
              <b >
                <a class="btn btn-success float-right" href="{{route('rendu.index')}}"><i class="fa fa-eye" aria-hidden="true"></i> mes rendus</a>
              </b>
              <form class="border p-4" action="{{route('rendu.store')}}" method="post" enctype="multipart/form-data">
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
                <div class="">
                  <label for="contenu">Entrez un commentaire</label>
                  <input id="contenu" class="form-control @error('contenu') is-invalid @enderror" type="text" name="contenu" placeholder="" value="{{ old('contenu') }}">
                      @error('contenu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
              </div>
                <div class="">
                  <label for="document">Entrez le document à soumettre</label>
                  <input id="document" class="form-control @error('document') is-invalid @enderror" type="file" name="document" placeholder=" " value="{{ old('document') }}">
                      @error('document')
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


 