<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  {!! Html::style('plantilla/vendors/iconfonts/font-awesome/css/all.min.css') !!}
  {!! Html::style('plantilla/vendors/css/vendor.bundle.base.css') !!}
  {!! Html::style('plantilla/vendors/css/vendor.bundle.addons.css') !!}
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  {!! Html::style('plantilla/css/style.css') !!}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
  @yield('styles')
  <!-- endinject -->
  <link rel="shortcut icon" href="http://www.urbanui.com/" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('home')}}"><img src="{{asset('plantilla/images/logo.svg')}}" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{route('home')}}"><img src="{{asset('plantilla/images/logo-mini.svg')}}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          @yield('create')
          
          <li class="nav-item nav-profile dropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"
              onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                  <i class="fas fa-power-off text-primary"></i>
                  Cerrar Sesión
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="fas fa-bars"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

      @yield('preference')

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->

      @include('layouts._nav')

      <!-- partial -->
      <div class="main-panel">
        
        @yield('content')
        
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024. Todos los derechos reservados al grupo 5.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Geely Store <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  {!! Html::script('plantilla/vendors/js/vendor.bundle.base.js') !!}
  {!! Html::script('plantilla/vendors/js/vendor.bundle.addons.js') !!}
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  {!! Html::script('plantilla/js/off-canvas.js') !!}
  {!! Html::script('plantilla/js/hoverable-collapse.js') !!}
  {!! Html::script('plantilla/js/misc.js') !!}
  {!! Html::script('plantilla/js/settings.js') !!}
  {!! Html::script('plantilla/js/todolist.js') !!}

  @include('sweetalert::alert')
  {!! Html::script('sweetalert2.all.min.js') !!}

  <!-- endinject -->
  <!-- Custom js for this page-->
  {!! Html::script('plantilla/js/dashboard.js') !!}
  <!-- End custom js for this page-->
  @yield('scripts')
</body>


</html>