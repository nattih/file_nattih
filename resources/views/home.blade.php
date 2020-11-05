
@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>
            <div class="card-body">
                <h2>Bienvenue  {{auth()->user()->name}} {{auth()->user()->prenom}} </h2>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {{ __('Vous êtes connecté(es) en en qu\'un simple utilisateur ') }} <strong>   </strong>!
            </div>
        </div>
      </div>
    </div>
@endsection