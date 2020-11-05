@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <section class="content">
        <div class="container-fluid">
          <div class="card"  data-aos="fade-right">
            <div class="card-header">
              <a class="btn btn-ntn mr-3" href=" "><i class="icofont-print" aria-hidden="true"></i> {{ __('pdf') }}</a>
              <b> La liste des avis récues de nos visiteurs</b>
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
                    <th scope="col">Message</th>
                    <th scope="col">Actions </th>
                  </tr>
                </thead>
                <tbody>
                @foreach($mgs as $key=>$mg)
                    <tr>
                        <td scope="">{{++$key}}</td>
                        <td >{{$mg->created_at->format('d/m/y à H:m')}} </td>
                        <td >{{$mg->nom}}</td>
                        <td >{{$mg->email}}</td>
                        <td >{{$mg->objet}}</td>
                        <td >{{$mg->message}}</td>
                        <td >
                            <a href=" "><button class="btn btn-ntn">Reponse</button></a>
                            <form action=" " method="post" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-warning"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
              @endforeach
                </tbody>
              </table>
              {{$mgs->links()}}
            </div>
        </div>
      </section>
@endsection