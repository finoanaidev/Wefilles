<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{config('app.name', 'LARAVEL')}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">


  <link href="{{asset('assets')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/aos/aos.css" rel="stylesheet">


  <link href="{{asset('assets')}}/css/variables.css" rel="stylesheet">
  <link href="{{asset('assets')}}/css/main.css" rel="stylesheet">

    @yield('style')
</head>

<body style="background-color: #f3f5fa">

  <!-- ======= Header ======= -->
  <header id="header" style="background-color: white" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo4.png" alt="" width="80px" height="65px">
        <h1>{{config('app.name', 'Laravel')}}</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{route('home')}}">Accueil</a></li>
          <li><a href="{{route('entreprise.index')}}">Entreprise</a></li>
          <li><a href="{{route('offre.index')}}">Offre d'emploi</a></li>
          <li><a href="{{route('forum.index')}}">Forum</a></li>
          <li><a href="{{route('profile.index')}}">Mon Profil</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">
        <a style="display:inline" href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <form action="{{route('logout')}}" method="post">
          @csrf
          <button type="submit" data-toggle="modal" data-target="#logout" href="#" class="mx-2"  style="border: none;background-color: inherit;display:inline"><span class="bi bi-door-open"></span></button>
        </form>
          
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->

      </div>

    </div>

  </header><!-- End Header -->

  <main id="main">
      <div class="container m-5" data-aos="fade-up">
            @yield('content')
      </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->


  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
{{--  --}}
  {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}

  <script src="{{asset('assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('assets')}}/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('assets')}}/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('assets')}}/vendor/aos/aos.js"></script>
  <script src="{{asset('assets')}}/vendor/php-email-form/validate.js"></script>

  <script src="{{asset('assets')}}/js/main.js"></script>

  @yield('scripts')

</body>

</html>