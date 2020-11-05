@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="content-wrapper"> <br>
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
              <a class="btn btn-ntn" href="{{route('cahier.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('Visiteur') }}</a>
              <b class="text-center ml-3">Cahier de visite</b>
        </div>

       

        <div class=" table table-responsive p-0">
          <table id="example1" class="table  table-hover">
            <thead>
              <tr class="bg-dark">
                <th scope="col">N°</th>
                <th scope="col">Date</th>
                <th scope="col">Nom & Prénom</th>
                <th scope="col">CNIB</th>
                <th scope="col">Motif</th>
                <th scope="col">Contact</th>
                <th scope="col">Genre</th>
                <th class="text-center" scope="col">Option</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=0; ?>
                @foreach($cahiers as $cahier)
                <?php $i++; ?>
                <tr>
                  <td>{{$i}}</td>
                  <td class="text-bold">{{$cahier->created_at}}</td>
                  <td>{{$cahier->nom}} {{$cahier->prenom}}
                  </td>
                  <td> {{$cahier->cnib}}</td>
                  <td> {{$cahier->motif}}</td>
                  <td>{{$cahier->contact}}</td>
                  <td>{{$cahier->genre}}</td>
                  <td>
                    <a href="{{route('cahier.edit',$cahier->id)}}"><button class="btn btn-ntn "> <i class="fas fa-edit"></i></button></a>
                      <form action="{{route('cahier.destroy', $cahier->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-warning d-inline"><i class="fas fa-trash"></i></button>
                      </form>
                  </td>
                </tr>
              </tbody>
                @endforeach
            </table>
              {{$cahiers->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
 
