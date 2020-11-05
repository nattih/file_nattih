@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <div class="container-fluid">
        <div class="card col-6">
            <div class="container ">
              <div>
                <h3 class="text-center text-bold">Ajouter une categorie</h3>
                <a class="btn btn-danger float-left" href="{{route('events.create')}}">retour</a>
              </div> <br> <br>
                <form action="{{route('categories.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="nom">Entrez le nom</label>
                      <input type="text" class="form-control  @error('nom') is-invalid @enderror" type="text" name="nom" id="nom" >
                        @error('nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2 float-right">Enregistrer</button>
                  </div>
                </div>
                </form>
            </div>
        </div>
      </div>
    </div>
@endsection


 