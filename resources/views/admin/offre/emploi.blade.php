@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <section class="content">
        <div class="container-fluid">
          <div class="card"  data-aos="fade-right">
            <div class="card-header">
              @can('delete-users')
              <a class="btn btn-ntn" href=" {{ route('emploi.pdf') }}"><i class="icofont-print" aria-hidden="true"></i> {{ __('pdf') }}</a>
              <a class="btn btn-ntn" href=" {{ route('emploi-export') }}"><i class="icofont-print" aria-hidden="true"></i> {{ __('excel') }}</a>
              <b> La liste des demandes d'emploi récues</b>
              @endcan
            </div>
            <div class="card-body table-responsive  p-0">
             <table class="table table-hover dataTable text-nowrap" id="exemple1">
                <thead>
                  <tr class="bg-dark">
                    <th scope="col">N°</th>
                    <th scope="col">Date</th>
                    <th scope="col">Nom & prénom(s)</th>
                    <th scope="col">Email</th>
                    <th scope="col">Objet</th>
                    <th scope="col">Actions </th>
                  </tr>
                </thead>
                <tbody>
                @foreach($offres as $key=>$offre)
                    <tr>
                        <td scope="row">{{++$key}}</td>
                        <td >{{$offre->created_at->format('d/m/y à H:m')}} </td>
                        <td >{{$offre->nom}}  </td>
                        <td >{{$offre->email}}</td>
                        <td >{{$offre->motif}}</td>
                        <td >
                            <a href=" "><button class="btn btn-ntn">Reponse</button></a>
                            <a href=" {{('storage').'/'.$offre->dossier}} "><button class="btn btn-ntn"><i class="fas fa-download"></i></button></a>
                            <form action=" {{route('destroy.emploi', $offre->id)}}" method="post" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-warning"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
              @endforeach
                </tbody>
              </table>
              {{$offres->links()}}
            </div>
        </div>
      </section>
@endsection