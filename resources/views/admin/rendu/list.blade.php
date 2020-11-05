@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <div class="container-fluid card ">
        <div class="card-body table-responsive  p-0">
        <h4 class="text-center">Mes rendus</h4>
          <table class="table table-hover dataTable text-nowrap" id="exemple1">
             <tbody>
             @foreach($rendus as $key=>$rendu)
             @can('view', $rendu)
                 <tr>
                     <td scope="row">{{++$key}}</td>
                     <td ><a href="{{route('rendu.show',$rendu)}}">{{$rendu->titre}}</a></td>
                     <td>{{$rendu->contenu}} </td>
                     <td scope="row"> Livré le {{$rendu->created_at->format('d/m/y à H:m')}}</td>
                     <td > par {{$rendu->user->name}} {{$rendu->user->prenom}}</td>
                     <td><a href=" {{('storage').'/'.$rendu->document}} "><button class="btn btn-ntn"><i class="fas fa-download"></i></button></a></td>
                 </tr>
                 @endcan 
           @endforeach
             </tbody>
           </table>
         </div>
      </div>
      <div class="d-flex justify-content-center mt-1">
        {{$rendus->links()}}
      </div>
    </div>
@endsection