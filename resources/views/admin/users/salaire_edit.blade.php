@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <section class="content">
        <div class="container-fluid">
            <div class="card d-flex justify-content-center">
                <div class="card-header d-flex justify-content-center">Salaire de : <strong> {{$user->name}} {{$user->prenom}}</strong></div>
                    <div class="card-body">
                    <form action="{{route('salaire.update', $user)}}" method="post">
                    @csrf
                    @method('PATCH')
                        <div class="form-group row">
                            <label for="salaire" class="col-md-4 col-form-label ">{{ __('Saissie du salaire') }}</label>
                            <div class="col-md-12">
                                <input id="salaire" type="text" class="form-control @error('salaire') is-invalid @enderror" name="salaire" 
                                value="{{ old('salaire') ?? $user->salaire }}" autocomplete="salaire" autofocus>
                                @error('salaire')
                                    <span class="invalid-feedback" role="alert">
                                        strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <button type="submit" class="btn btn-ntn">Ajouter</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>        
@endsection
