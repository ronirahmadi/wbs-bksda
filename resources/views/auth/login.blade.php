<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Whistleblowing System BKSDA</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Cleaning Company Website Template" name="keywords">
        <meta content="Cleaning Company Website Template" name="description">

        <!-- Favicon -->
        <link href="img/bksda.png" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400&display=swap" rel="stylesheet">
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
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
                                        <li class="{{ Request::segment(1) === 'home' ? 'active' : null }}">
                                            <a href="{{ route('home') }}" class="nav-item nav-link">Beranda</a>
                                        </li>
                                        <li class="{{ Request::segment(1) === 'informasi' ? 'active' : null }}">
                                            <a href="{{ route('informasi') }}" class="nav-item nav-link">Informasi</a>
                                        </li>
                                        <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pelayanan</a>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('laporans.create') }}" class="dropdown-item">Tulis Laporan</a>
                                                <a href="{{ route('pantau') }}" class="dropdown-item">Pantau Laporan</a>
                                                <a href="{{ route('statistik') }}" class="dropdown-item">Statistik Laporan</a>
                                            </div>
                                        </div>
                                        <li class="{{ Request::segment(1) === 'bantuan' ? 'active' : null }}">
                                            <a href="{{ route('bantuan') }}" class="nav-item nav-link">Bantuan</a>
                                        </li>
                                        <li class="{{ Request::segment(1) === 'satwa' ? 'active' : null }}">
                                            <a href="{{ route('satwa') }}" class="nav-item nav-link">Daftar Satwa</a>
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
            <!-- Header End -->

            <!--halaman login -->
            <div class="hero row align-items-center mt-5">
                <div class="col-md-5 mt-2">
                    <div class="form">
                        <h3>Masuk</h3>
                        <!-- Autentikasi Login -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <input id="email" type="email" placeholder="Alamat E-Mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" style="color:#FFFFFF;">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            
                            <button type="submit" class="btn btn-block mt-2">
                                {{ __('Login') }}
                            </button>

                        </form>

                        <button class="btn btn-block mt-2"><a href="{{ url('auth/google') }}" style="color: #000000;">Masuk dengan Google | <i class="fab fa-google"></i></a></button>

                        <button class="btn btn-block mt-2">
                            <a href="{{ route('register') }}" style="color:#000000;">
                            Buat Akun Baru?
                            </a>
                        </button>
                        <!-- Autentikasi Login Selesai -->
                    </div>
                </div>
                <div class="col-md-7">
                    <h2><span>Lakukan</span> Registrasi</h2>
                    <p>Jika belum memiliki akun</p>
                </div>
            </div>
            <!-- halaman login selesai -->

            <!-- Footer Start -->
            <div class="footer">
                <div class="container footer-menu">
                    <div class="f-menu">
                        <a href="http://bksdajogja.org/"><strong>2021 © Whistleblowing System BKSDA</strong></a>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
            
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
