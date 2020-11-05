@extends('layouts.app')
@section('content')
  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"><br>
      <section class="content">
        <div class="container-fluid">
          <div class="card">
              <section id="doctors" class="doctors">
                <div class="container" data-aos="fade-up">
                  <div class="section-title">
                    <h2>Notre équipe</h2>
                  </div>
                  <div class="row card-body ">
                    @foreach ($users as $user)
                    <div class="col-lg-3 col-md-6 d-flex  ">
                      <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                          <img src="{{asset('storage').'/'.$user->photo}}" class="img-fluid" alt="">
                          <div class="social">
                            <a href=""><i class="icofont-eye-alt"></i>Voir</a>
                            <a href=""><i class="icofont-edit-alt"></i>Editer</a>
                            <a href=""><i class="icofont-bin">Sup</i></a>
                          </div>
                        </div>
                        <div class="member-info">
                          <h4>{{$user->name}} {{$user->prenom}}</h4>
                          <p >{{$user->poste->nom}}</p>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </section>
        </div>
      </div>
    </div>
  </section>
@endsection