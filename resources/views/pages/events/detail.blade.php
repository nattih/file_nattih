@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <div class="container-fluid">
        <div class="card">
            <div class="card-header ">
              <h2 class="text-center">Les evenements du....</h2>
            </div>
              <div class="table table-responsive p-0 card-body">
                <table id="example1" class="table table-hover   text-nowrap ">
                  <thead>
                  <tr class="bg-dark">
                    <th scope="col">N°</th>
                    <th scope="col">Date</th>
                    <th scope="col">Titre</th>
                    <th scope="col">image</th>
                    <th scope="col" class="">Option</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                    @foreach($events as $event)
                    <?php $i++; ?>
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$event->created_at}}</td>
                    <td class="text-bold"> {{$event->titre}} </td>
                    <td><img src="{{asset('storage').'/'.$event->image}}" style="width:50px;height:50px;" class="bf5 border rounded-circle "></td>
                    <td>
                      <a href="{{route('events.show',[$event->id])}} "><button class="btn btn-success"> <i class="fas fa-eye"></i></button></a>
                      <a href="{{route('events.edit',$event->id)}} "><button class="btn btn-ntn"><i class="fas fa-edit"></i></button></a>
                        <form action=" {{route('events.destroy',$event->id)}}" method="post" class="d-inline">
                          @csrf
                              @method('DELETE')
                          <button type="submit" class="btn btn-warning"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                  </tr>
              </tbody>
                @endforeach
            </table>
            {{$events->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection