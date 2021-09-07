<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Admin Whistleblowing System BKSDA</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../../../img/bksda.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../../js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../../css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/atlantis.min.css">

	<!-- search -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<div class="logo">
					<img src="../../img/logo.svg" alt="navbar brand" class="navbar-brand">
				</div>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						@foreach($laporans as $laporan)
						@csrf
						<form class="navbar-left navbar-form nav-search mr-md-3" action="{{ route('laporans.show',$laporan->id) }}">
						@endforeach	
							<div class="input-group">
								<select name="livesearch" class="livesearch form-control"></select>
								<input type="submit">
								<script type="text/javascript">
									$('.livesearch').select2({
										placeholder: 'Cari Laporan',
										ajax: {
											url: '/ajax-autocomplete-search',
											dataType: 'json',
											delay: 250,
											processResults: function (data) {
												return {
													results: $.map(data, function (item) {
														return {
															text: item.judul,
															id: item.id
														}
													})
												};
											},
											cache: true
										}
									});
								</script>
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">{{ $belumdiverifikasi }}</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">Laporan Masuk</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
									@foreach($notif as $notif)
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"> <i class="fa fa-file-alt"></i> </div>
												<div class="notif-content">
													<span class="block">
														{{ $notif->judul }}
													</span>
													<span class="time">{{ $notif->created_at }}</span> 
												</div>
											</a>
										</div>
									@endforeach
									</div>
								</li>
								<li>
									<a class="see-all" href="{{ route('laporans.index') }}">Lihat semua laporan<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<i style="color:#ffffff" class="fa fa-user"></i>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
								@guest
									<li>
									@else
										<div class="user-box">
											<div class="avatar-lg"><img src="{{ asset('img/bksda.png') }}" alt="profil admin" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>{{ Auth::user()->name }}</h4>
												<p class="text-muted">{{ Auth::user()->email }}</p><!--<a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>-->
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{ route('logout') }}"
										onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</li>
								@endguest
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary">
						<li class="nav-item {{ Request::segment(1) === 'admin-view' ? 'active' : null }}">
							<a href="{{ route('admin-view') }}">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Fitur Utama</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Table Data Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li class="{{ Request::segment(1) === 'jenis.penyimpangan' ? 'active' : null }}">
										<a href="{{ route('jenis.penyimpangan') }}">
											<span class="sub-item">Penyimpangan Tugas</span>
										</a>
									</li>
									<li class="{{ Request::segment(1) === 'jenis.gratifikasi' ? 'active' : null }}">
										<a href="{{ route('jenis.gratifikasi') }}">
											<span class="sub-item">Gratifikasi</span>
										</a>
									</li>
									<li class="{{ Request::segment(1) === 'jenis.benturan' ? 'active' : null }}">
										<a href="{{ route('jenis.benturan') }}">
											<span class="sub-item">Benturan Kepentingan</span>
										</a>
									</li>
									<li class="{{ Request::segment(1) === 'ditolak' ? 'active' : null }}">
										<a href="{{ route('jenis.melanggar') }}">
											<span class="sub-item">Melanggar Peraturan</span>
										</a>
									</li>
									<div class="dropdown-divider"></div>
									<li class="{{ Request::segment(1) === 'laporans.index' ? 'active' : null }}">
										<a href="{{ route('laporans.index') }}">
											<span class="sub-item">Belum Diverifikasi</span>
										</a>
									</li>
									<li class="{{ Request::segment(1) === 'diproses' ? 'active' : null }}">
										<a href="{{ route('diproses') }}">
											<span class="sub-item">Lolos Verifikasi</span>
										</a>
									</li>
									<li class="{{ Request::segment(1) === 'ditolak' ? 'active' : null }}">
										<a href="{{ route('ditolak') }}">
											<span class="sub-item">Tidak Lolos Verifikasi</span>
										</a>
									</li>
									<div class="dropdown-divider"></div>
									<li class="{{ Request::segment(1) === 'selesai' ? 'active' : null }}">
										<a href="{{ route('selesai') }}">
											<span class="sub-item">Laporan Selesai</span>
										</a>
									</li>
									<div class="dropdown-divider"></div>
								</ul>
							</div>
						</li>
						<li class="nav-item {{ Request::segment(1) === 'grafiklaporan' ? 'active' : null }}">
							<a href="{{ route('grafiklaporan') }}">
								<i class="fas fa-chart-bar"></i>
								<p>Grafik Data Laporan</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Fitur Tambahan</h4>
						</li>
						<li class="nav-item">
							<a href="{{ route('tabeluser') }}">
								<i class="fas fa-user"></i>
								<p>Table Data User</p>
							</a>
						</li>
						<li class="nav-item">
							<a target="_blank" href="{{ url('http://localhost:8000/api/laporans') }}">
								<i class="fas fa-database"></i>
								<p>Laporan dalam API</p>
							</a>
						</li>
						<li class="nav-item {{ Request::segment(1) === 'kritiksaran' ? 'active' : null }}">
							<a href="{{ route('kritiksaran') }}">
								<i class="fas fa-exclamation-circle"></i>
								<p>Kritik & Saran</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

        @include('sweetalert::alert')
		@yield('content')

        <footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
					</div>				
				</div>
			</footer>
		</div>
		
	<!--   Core JS Files   -->
	<script src="../../../../js/core/jquery.3.2.1.min.js"></script>
	<script src="../../../../js/core/popper.min.js"></script>
	<script src="../../../../js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../../../../js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../../../js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../../../../js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../../../../js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../../../../js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../../../../js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="../../../../js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="../../../../js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="../../../../js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../../../../js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../../../../js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../../../../js/atlantis.js"></script>
	<script src="../../../../js/atlantis2.js"></script>
	<script src="../../../../js/atlantis.min.js"></script>

	<!-- map indo -->
	<script src="../../../../js/countrymap.js"></script>
</body>
</html>