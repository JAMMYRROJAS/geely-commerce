<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistema de Ventas - Geely</title>
  <!-- plugins:css -->
  {!! Html::style('plantilla/vendors/iconfonts/font-awesome/css/all.min.css') !!}
  {!! Html::style('plantilla/vendors/css/vendor.bundle.base.css') !!}
  {!! Html::style('plantilla/vendors/css/vendor.bundle.addons.css') !!}
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  {!! Html::style('plantilla/css/style.css') !!}
  <!-- endinject -->
  <link rel="shortcut icon" href="plantilla/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="{{asset('plantilla/images/logo.svg')}}" alt="logo">
              </div>
              <h4>Comercializadora Geely</h4>

              @yield('content')

            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2024 Todos los derechos reservados - Comercializadora Geely</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  {!! Html::script('plantilla/vendors/js/vendor.bundle.base.js') !!}
  {!! Html::script('plantilla/vendors/js/vendor.bundle.addons.js') !!}
  <!-- endinject -->
  <!-- inject:js -->
  {!! Html::script('plantilla/js/off-canvas.js') !!}
  {!! Html::script('plantilla/js/hoverable-collapse.js') !!}
  {!! Html::script('plantilla/js/misc.js') !!}
  {!! Html::script('plantilla/js/settings.js') !!}
  {!! Html::script('plantilla/js/todolist.js') !!}
  <!-- endinject -->
</body>
</html>
