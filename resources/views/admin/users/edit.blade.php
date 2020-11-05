@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <section class="content">
        <div class="container-fluid">
            <div class="card d-flex justify-content-center">
                <div class="card-header d-flex justify-content-center">Modifier : <strong> {{$user->name}} {{$user->prenom}}</strong></div>
                    <div class="card-body">
                        <form action="{{route('admin.users.update', $user)}}" method="post">
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
                            @foreach ($roles as $role )
                                <div class="form-group form-check ">
                                    <input type="checkbox" class="form-check-input  " name="roles[]" value="{{$role->id}}" 
                                        id="{{$role->id}}" @if($user->roles->pluck('id')->contains($role->id)) checked
                                            @endif> 
                                    <label for="{{$role->id}}" class="form-check-label">{{$role->name}}</label>    
                                </div>   
                            @endforeach
                            <button type="submit" class="btn btn-ntn">Modifier les informations</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>        
@endsection
