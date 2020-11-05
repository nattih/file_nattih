@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              @foreach ($dpts as $dpt)
                    <a class="btn btn-info" href=" {{route('admin.dpts.show', $dpt->id)}}"> {{$dpt->nom}} </a> 
                @endforeach
            </div>
          </div>
          <div class="card"  data-aos="fade-right">
            <div class="card-header">
              @can('delete-users')
              <a class="btn btn-ntn" href="{{ route('register') }}"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('Agent') }}</a>
              <a class="btn btn-ntn" href="{{route('users.inactif')}}"><i class="fa icofont-archive" aria-hidden="true"></i> {{ __('Anciens Agent') }}</a>
              @endcan
            </div>
            <div class="card-body table-responsive  p-0">
             <table class="table table-hover dataTable text-nowrap" id="exemple1">
                <thead>
                  <tr class="bg-dark">
                    <th scope="col">N°</th>
                    <th scope="col">Nom & prénom(s)</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Residence</th>
                    {{-- <th scope="col">Poste</th> --}}
                    <th scope="col">Actions </th>
                  </tr>
                </thead>
                <tbody>
                @foreach($users as $key=>$user)
                    <tr>
                        <td scope="row">{{++$key}}</td>
                        <td >{{$user->name}} {{$user->prenom}}</td>
                        <td >{{$user->email}}</td>
                        <td >{{$user->contact}}</td>
                        <td >{{$user->residence}}</td>
                        {{-- <td >{{$user->poste->nom}}</td> --}}
                        <td >
                          @can('edit-users')
                            <a href="{{route('pers.edit',$user->id)}}"><button class="btn btn-ntn"><i class="fas fa-edit"></i></button></a>
                          @endcan
                            @can('delete-users')
                            <form action="{{route('user.delete',$user->id)}}" method="post" class="d-inline">
                              @csrf
                              @method('PUT')
                              <button type="submit" class="btn btn-warning"><i class="fas fa-trash"></i></button>
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
        </div>
      </section>
@endsection