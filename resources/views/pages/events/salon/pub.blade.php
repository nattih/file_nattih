@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="content-wrapper"> <br>
    <div class="container-fluid ">
      <section id="doctors" class=" ">
        <div class="section-title">
          <h2>Les news du Bureau</h2>
        </div>
        @foreach ($events as $event)
            <div class="card " data-aos="fade-up">
              <div class="row card-body" >
                <div class="col-md-2">
                  <img src="{{asset('storage').'/'.$event->image}}" class="img-fluid" alt="image">
                </div>
                <div class="col-md-10 ">
                    <h2 class="card-title text-bold">{{$event->titre}}</h2>
                    <p class="card-text">{{$event->description}}</p>
                    <p class="card-text"><small class="text-muted">Publié le {{$event->created_at}} par
                      <span class="text-bold">{{$event->user->name}}</span></small></p>
                      <span class="text-bold"><a href=""><i class="icofont-google-talk"></i></a>(3)</span></small>
                    </p>
                </div>
              </div>
            </div>
        @endforeach
      </section>
      {{$events->links()}}
  </div>
@endsection