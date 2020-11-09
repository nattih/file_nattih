@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <section class="content">
        <div class="container-fluid">
          <div class="card"  data-aos="fade-right">
            <div class="card-header text-center">
              <b> La liste des rendus du personel</b>
            </div>
            <div class="card-body table-responsive  p-0">
             <table class="table table-hover dataTable text-nowrap" id="exemple1">
                <thead>
                  <tr class="bg-dark">
                    <th scope="col">N°</th>
                    <th scope="col">Date</th>
                    <th scope="col">Nom & prenom</th>
                    <th scope="col">Departement</th>
                    <th scope="col">Poste</th>
                    <th scope="col">Titre</th>
                    <th scope="col" class="">Option </th>
                  </tr>
                </thead>
                <tbody>
                @foreach($rendus as $key=>$rendu)
                    <tr>
                        <td scope="row">{{++$key}}</td>
                        <td scope="row">{{$rendu->created_at->format('d/m/y à H:m')}}</td>
                        <td >{{$rendu->user->name}} {{$rendu->user->prenom}}</td>
                        <td >
                          @if($rendu->user->departement )
                            {{$rendu->user->departement->nom}}
                          @endif
                          </td>
                        <td >
                          @if($rendu->user->poste )
                            {{$rendu->user->poste->nom}}
                          @endif
                          </td>
                        <td >{{ $rendu->titre}}</td>
                        <td >
                            <a href="{{route('rendu.show',$rendu)}}"><button class="btn btn-success">Reponse</button></a>
                            <a href=" {{('storage').'/'.$rendu->document}} "><button class="btn btn-ntn"><i class="fas fa-download"></i></button></a>
                        </td>
                    </tr>
              @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </section>
@endsection