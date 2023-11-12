  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="login" class="logo d-flex align-items-center" target="_blank">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="d-flex align-items-center">Nova</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#" class="active">Inicio</a></li>
          <li><a href="{{url('../resources/views/nosotros.blade.php')}}">Nosotros</a></li>
          <li><a href="{{url('../resources/views/servicios.blade.php')}}">Servicios</a></li>  
          <li><a href="{{url('../resources/views/galeria.blade.php')}}">Galeria</a></li>
          <li><a href="{{url('../resources/views/blog.blade.php')}}">Blog</a></li>
          <li><a href="{{url('../resources/views/contacto.blade.php')}}">Contacto</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->