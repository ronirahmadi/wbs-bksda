<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Whistleblowing System BKSDA</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Cleaning Company Website Template" name="keywords">
        <meta content="Cleaning Company Website Template" name="description">

        <!-- Favicon -->
        <link href="../../img/bksda.png" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400&display=swap" rel="stylesheet">
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="../../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="../../css/style.css" rel="stylesheet">
        <link href="../../css/main.css" rel="stylesheet">
        <link rel=”stylesheet” href=”../../font-awesome/css/font-awesome.min.css”/>

        <!-- Dropdown Indonesia -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    </head>

    <body>
        <div class="wrapper">
            <!-- Header Start -->
            <div class="header">
                <div class="container-fluid">
                    <div class="header-top row align-items-center">
                        <div class="col-lg-9">
                            <div class="navbar navbar-expand-lg bg-light navbar-light">
                                <a href="#" class="navbar-brand">MENU</a>
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                    <div class="navbar-nav ml-auto">
                                        <li>
                                            <a href="{{ route('home') }}" class="nav-item nav-link {{ Request::segment(1) === 'home' ? 'active' : null }}">Beranda</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('informasi') }}" class="nav-item nav-link {{ Request::segment(1) === 'informasi' ? 'active' : null }}">Informasi</a>
                                        </li>
                                        <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pelayanan</a>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('lapor') }}" class="dropdown-item {{ Request::segment(1) === 'lapor' ? 'active' : null }}">Tulis Laporan</a>
                                                <a href="{{ route('pantau') }}" class="dropdown-item {{ Request::segment(1) === 'pantau' ? 'active' : null }}">Pantau Laporan</a>
                                                <a href="{{ route('statistik') }}" class="dropdown-item {{ Request::segment(1) === 'statistik' ? 'active' : null }}">Statistik Laporan</a>
                                            </div>
                                        </div>
                                        <li>
                                            <a href="{{ route('bantuan') }}" class="nav-item nav-link {{ Request::segment(1) === 'bantuan' ? 'active' : null }}">Bantuan</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('satwa') }}" class="nav-item nav-link {{ Request::segment(1) === 'satwa' ? 'active' : null }}">Daftar Satwa</a>
                                        </li>
                                        @guest
                                       
                                        @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <strong>{{ Auth::user()->name }}</strong>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->
            @include('sweetalert::alert')
            @yield('content')
            <!-- Footer Start -->
            <div class="footer">
                <div class="container footer-menu">
                    <div class="f-menu">
                        <h1><span style="color: #FFD662;">Whistleblowing</span> System Internal BKSDA</h1>
                        <img src="{{ asset('img/bksda.png') }}">
                        <h5>Kementerian Lingkungan Hidup dan Kehutanan Republik Indonesia</h5>
                        <p>Gedung Manggala Wanabakti Blok I lt. 2 Jl. Jenderal Gatot Subroto - Jakarta 10270, Po Box 6505, Indonesia</p>
                        <p>Telepon: (021) 5730191 | Fax: (021) 5705086</p>
                    </div>
                </div>
                <div class="container footer-menu">
                    <div class="f-menu">
                        <p style="font-size: 12px;">Hak cipta © 2021 Kementerian Lingkungan Hidup dan Kehutanan Republik Indonesia - Whistleblowing System BKSDA</p>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
            
            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="../../lib/easing/easing.min.js"></script>
        <script src="../../lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="../../lib/isotope/isotope.pkgd.min.js"></script>
        <script src="../../lib/lightbox/js/lightbox.min.js"></script>

        <!-- Template Javascript -->
        <script src="../../js/main.js"></script>
    </body>
</html>