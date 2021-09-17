@extends('layouts.admin')
@section('content')
<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
						<h5 class="text-white op-7 mb-2">Selamat Datang di Halaman Admin Whistleblowing System BKSDA</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="page-inner mt--5">
			<div class="row row-card-no-pd mt--2">
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<!-- antara icon exclamation dan agenda -->
										<i class="flaticon-agenda text-warning"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Laporan Selesai</p>
										<h4 class="card-title">{{ $selesai }}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-error text-danger"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Laporan Ditolak</p>
										<h4 class="card-title">{{ $ditolak }}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-success text-success"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Lolos Verifikasi</p>
										<h4 class="card-title">{{ $lolos }}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-list text-primary"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Perlu Verifikasi</p>
										<h4 class="card-title">{{ $belumdiverifikasi }}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="page-inner mt--5">
				<div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<div class="card-title">Grafik Data Laporan Per Tahun</div>
								</div>
							</div>
							<div class="card">
								<canvas id="Chart1" style="width: 100%;"></canvas>
								<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"></script>
								<script type="text/javascript">
								
								//ambil data laporan
								var grafiklaporans =  <?php echo json_encode($grafiklaporans) ?>;
								var grafiklaporansdiproses =  <?php echo json_encode($grafiklaporansdiproses) ?>;
								var grafiklaporansditolak =  <?php echo json_encode($grafiklaporansditolak) ?>;
								
								//eksekusi data laporan
								var ctx = document.getElementById('Chart1').getContext('2d');
								var grafiklaporans = new Chart(ctx, {
									type: 'line',
									data: {
										labels: ['Sep', 'Okt', 'Nov', 'Des','Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu'],
										datasets: [ {
										label: "Laporan Masuk",
											data: grafiklaporans,
											fill: false,
											borderColor: 'rgba(253, 175, 75, 0.6)',
											backgroundColor: 'rgba(253, 175, 75, 0.4)',
											legendColor: '#fdaf4b',
											tension: 0.1
										}, {
										label: "Laporan Diproses",
											data: grafiklaporansdiproses,
											fill: false,
											borderColor: 'rgba(0, 255, 0, 0.6)',
											backgroundColor: 'rgba(0, 255, 0, 0.4)',
											legendColor: '#00ff00',
											tension: 0.1
										}, {
										label: "Laporan Ditolak",
										data: grafiklaporansditolak,
											fill: false,
											borderColor: 'rgba(243, 84, 93, 0.6)',
											backgroundColor: 'rgba(243, 84, 93, 0.4)',
											legendColor: '#f3545d',
											tension: 0.1
										}]
									},
									options: {
										scales: {
											y: {
												beginAtZero: true
											}
										},
									}
								});
								</script>	
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-primary bg-primary-gradient">
							<div class="card-body">
								<h4 class="mt-3 b-b1 pb-2 mb-4 fw-bold">Jumlah laporan masuk</h4>
								<h1 class="mb-4 fw-bold">{{ $laporanmasuk }} Laporan</h1>
								<p class="mt-3 b-b1 pb-2 mb-5">Berdasarkan data dari aplikasi WBS BKSDA</p>
								<div id="activeUsersChart"></div>
								<h4 class="mt-5 pb-3 mb-0 fw-bold">Jumlah user terdaftar</h4>
								<h1 class="mb-4 fw-bold">{{ $userterdaftar }} User</h1>
							</div>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>
@endsection