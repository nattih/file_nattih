@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <section class="content">
        <div class="container-fluid">
          <div class="card"  data-aos="fade-right">
            <div class="card-header">
              
              <a class="btn btn-ntn" href=" "><i class="icofont-print" aria-hidden="true"></i> {{ __('pdf') }}</a>
            
            </div>
            <div class="card-body table-responsive  p-0">
             <table class="table table-hover dataTable text-nowrap" id="exemple1">
                <thead>
                  <tr class="bg-dark">
                    <th scope="col">N°</th>
                    <th scope="col">Nom & prénom(s)</th>
                    <th scope="col">Email</th>
                    <th scope="col">Département</th>
                    <th scope="col">Poste occupé</th>
                    <th scope="col">Salaire mensuel </th>
                    <th scope="col">Action </th>
                  </tr>
                </thead>
                <tbody>
                @foreach($users as $key=>$user)
                    <tr>
                        <td scope="row">{{++$key}}</td>
                        <td >{{$user->name}} {{$user->prenom}}</td>
                        <td >{{$user->email}}</td>
                        <td >{{$user->departement_id}}</td>
                        <td >{{$user->poste_id}}</td>
                        <td >{{$user->salaire}} </td>
                        <td >
                            <a href="{{route('salaire.edit',$user->id)}}"><button class="btn btn-ntn"><i class="fas fa-edit"></i></button></a>
                            <form action="{{route('users.paiement',$user->id)}}" method="post" class="d-inline">
                              @csrf
                              @method('PUT')
                              <button type="submit" class="btn btn-success">Versement</button>
                            </form>
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