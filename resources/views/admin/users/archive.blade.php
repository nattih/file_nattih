@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <section class="content">
        <div class="container-fluid">
          <div class="card"  data-aos="fade-right">
            <div class="card-header">
              @can('delete-users')
              <a class="btn btn-ntn" href=" {{route('archive.pdf')}}"><i class=" icofont-print" aria-hidden="true"></i> {{ __('pdf') }}</a>
              <a class="btn btn-ntn" href="{{route('archive-export')}} "><i class=" icofont-print" aria-hidden="true"></i> {{ __('excel') }}</a>
              @endcan
            </div>
            <div class="card-body table-responsive  p-0">
             <table class="table table-hover dataTable text-nowrap" id="exemple1">
                <thead>
                  <tr class="bg-dark">
                    <th scope="col">N°</th>
                    <th scope="col">Nom & prénom(s)</th>
                    <th scope="col">Email</th>
                    <th scope="col">Departement</th>
                    <th scope="col">poste</th>
                    <th scope="col">Desactivé</th>
                    <th scope="col">Actions </th>
                  </tr>
                </thead>
                <tbody>
                @foreach($users as $key=>$user)
                    <tr>
                        <td scope="row">{{++$key}}</td>
                        <td >{{$user->name}} {{$user->prenom}}</td>
                        <td >{{$user->email}}</td>
                        <td >{{$user->departement->nom}}</td>
                        <td >{{$user->poste->nom}}</td>
                        <td >{{$user->updated_at->format('d/m/y à H:m')}}</td>
                        <td >
                            @can('delete-users')
                            <form action="{{route('activer.user',$user->id)}}" method="post" class="d-inline">
                              @csrf
                              @method('PUT')
                              <button type="submit" class="btn btn-success">Activer</button>
                            </form>
                        @endcan
                        
                        </td>
                    </tr>
              @endforeach
                </tbody>
              </table>
              {{$users->links()}}
            </div>
        </div>
      </section>
@endsection