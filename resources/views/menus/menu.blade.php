<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light bgnav">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <div>
      <strong>
        <script type="text/javascript">
          var ladate=new Date()
          document.write(" Le ");
          document.write(ladate.getUTCDate()+"-"+(ladate.getMonth()+1)+"-"+ladate.getFullYear()+"/  "+(ladate.getUTCHours())+":"+(ladate.getUTCMinutes()))
        </script>
      </strong>
    </div>
    <div class=" ">
      <a class="btn btn-ntn ml-2" href="{{route('portail')}}" class="nav-link">Hors du bureau</a>
    </div>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                {{-- <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p> --}}
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          {{-- <a href="#" class="dropdown-item dropdown-footer">See All Messages</a> --}}
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      @unless (auth()->user()->unreadNotifications->isEmpty())
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"> {{auth()->user()->unreadNotifications->count()}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          @foreach (auth()->user()->unreadNotifications as $notification)
          <div class="dropdown-divider"></div>
          <a href=" {{route('show.notification', ['rendu'=> $notification->data['renduId'] , 'notification' => $notification->id])}}" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> {{$notification->data['name']}} commente sur
            <strong><span class="  text-muted text-sm  "> {{$notification->data['renduTitre']}}</span></strong>
          </a>
          @endforeach
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      @endunless
      
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="">
          <i class="far fa-user-circle"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right ">
          <a href=" {{route('profile')}}" class="dropdown-item ">
            <i class="icofont-business-man mr-2"></i> <span class="text-bold">Mon profile</span>
          </a>
          <div class="dropdown-divider"></div>
          <a  href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
            <i class="icofont-exit mr-2"></i> <span class="text-bold"> Deconnexion </span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar
  <! Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div>
    <a href="#"  class="brand-link">
        <img src="{{asset('storage').'/'. Auth::user()->photo}}" style="width:50px;height:50px;" class=" brand-image img-circle elevation-2" alt="User Image">
        <span class="brand-text font-weight-light"> {{Auth::user()->name }} {{Auth::user()->prenom }}</span>
    </a>
  </div>
    <!-- Sidebar -->
    <div class="sidebar ">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('admin.users.index')}}" class="nav-link active ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Accueil
              </p>
            </a>
           
          </li>
          @can('delete-users')
          <li class="nav-item">
            <a href="{{route('users.actif')}}" class="nav-link ">
              <i class="nav-icon  icofont-options"></i>
              <p>
                Administration
              </p>
            </a>
          </li>
          @endcan
          <li class="nav-item">
            <a href="{{route('rendu.create')}}" class="nav-link ">
              <i class="nav-icon  icofont-papers"></i>
              <p>
                Rendre un document
              </p>
            </a>
          </li>
          @can('manage-users')
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon icofont-users"></i>
              <p>
                Personel
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{route('admin.dpts.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste du personel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('rendu')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Les rendus</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('finance')
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon icofont-bank"></i>
              <p>
                Finance
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{route('users.salaire')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salaire</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Depenses</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('manage-users')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Espace offre
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('emploi')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Emplois</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('stage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stage</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('secretariat')
          <li class="nav-item has-treeview">
            <a class="nav-link "  href="{{ route('cahier.index') }}">
              <i class="nav-icon icofont-address-book"></i> Cahier de visiteur </a>
          </li>
          @endcan
          @can('com')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Publication
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nos evenements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('message')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Messages</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          <li class="nav-item has-treeview">
            <a href="{{route('events.index')}}" class="nav-link">
              <i class="nav-icon icofont-news"></i>
              <p>
                Espace membre
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a class="nav-link "  href="{{ route('logout') }}">
              <i class="nav-icon icofont-exit"></i> Deconnexion </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>