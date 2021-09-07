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
            <div class="header home">
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
            <!-- Header End -->
            
            <!-- Home Start -->
            <div class="hero row align-items-center">
                <div class="col-md-7">
                    <h2><strong>Laporkan Segera!</strong></h2>
                    <h2><span>Jika</span> Anda</h2>
                    <p>Menemui orang yang memperjualbelikan atau mengancam kepunahan satwa dilindungi</p>
                    <a class="btn" href="{{ route('laporans.create') }}">Laporkan Sekarang!</a>
                </div>
                <div class="col-md-5">
                    <div class="form">
                        <h3>Daftar Sekarang</h3>
                        <!-- Autentikasi Login -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <input id="name" type="text" placeholder="Nama Pengguna" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="email" type="email" placeholder="Alamat E-Mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Masukkan Alamat E-Mail dengan Benar</strong>
                                </span>
                            @enderror

                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Kata sandi minimal harus 8 karakter.</strong>
                                </span>
                            @enderror

                            <input id="password-confirm" type="password" placeholder="Konfirmasi Password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            <a href="{{ route('login') }}" style="color:#FFFFFF;">
                                    <strong>Masuk ke Akun yang Sudah Ada?</strong>
                            </a>

                            <button class="btn btn-block mt-2" type="submit">{{ __('Register') }}</button>
                        </form>

                        <button class="btn btn-block mt-2"><a href="{{ url('auth/google') }}" style="color: #000000;">Masuk dengan Google | <i class="fab fa-google"></i></a></button>

                        <!-- Autentikasi Login Selesai -->
                    </div>
                </div>
            </div>
            </div>
            </div>
            <!-- Home End -->
                                
            <!-- FAQs Start -->
            <div class="faqs">
            <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="section-header left">
                        <h2><strong>Identitas Anda Dijamin Kerahasiaanya</strong></h2>
                    </div>
                    <img src="img/datasecurity.jpg" alt="Image">
                </div>
                <div class="col-md-7">
                    <div id="accordion">
                        <h5 style="color:black;"><strong>Tata Cara Melapor</strong></h5>
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                    <span>1</span> Periksa Laporan Anda
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                <div class="card-body">
                                Sebelum melaporkan pengaduan Anda di Whistleblowing System BKSDA, terlebih dahulu periksa kelengkapan pengaduan Anda apakah telah sesuai dengan kriteria pengaduan yang telah ditetapkan.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseTwo">
                                    <span>2</span> Registrasi atau Masuk 
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                Lakukan registrasi atau masuk untuk mengakses pelayanan dan melakukan laporan.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseThree">
                                    <span>3</span> Melakukan Laporan
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                Klik menu "Pelayanan" pilih "Laporan" dan lanjutkan dengan mengisi formulir laporan yang telah disediakan lalu tekan tombol "Kirim Laporan".
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseFour">
                                    <span>4</span> Pantau Laporan Anda
                                </a>
                            </div>
                            <div id="collapseFour" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Anda dapat memantau laporan yang pernah dikirim, membuat laporan baru dan juga dapat melakukan komunikasi secara pribadi dengan administrator WBS melalui halaman khusus pelapor.
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn" href="{{ route('informasi') }}">Kriteria Laporan</a>
                </div>
            </div>
            </div>
            </div>
            <!-- FAQs End -->

            <!-- Footer Start -->
            <div class="footer">
                <div class="container footer-menu">
                    <div class="f-menu-2">
                        <h1><span style="color: #FFD662;">Whistleblowing</span> System Internal BKSDA</h1>
                        <img src="{{ asset('img/bksda.png') }}">
                        <h5>Kementerian Lingkungan Hidup dan Kehutanan Republik Indonesia</h5>
                        <p>Gedung Manggala Wanabakti Blok I lt. 2 Jl. Jenderal Gatot Subroto - Jakarta 10270, Po Box 6505, Indonesia</p>
                        <p>Telepon: (021) 5730191 | Fax: (021) 5705086</p>
                    </div>
                </div>
                <div class="container footer-menu">
                    <div class="f-menu-2">
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
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>