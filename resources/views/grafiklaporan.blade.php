@extends('layouts.admin')
@section('content')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<h4 class="page-title">Grafik Data Aplikasi WBS BKSDA</h4>
					<div class="page-category">Terdapat beberapa grafik data dari laporan yang masuk ke aplikasi WBS BKSDA.</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row card-tools-still-right">
										<h4 class="card-title">Grafik Laporan Berdasarkan Jenis Pelanggaran</h4>
									</div>
									<p class="card-category">
									Berdasarkan kategori pelanggaran dalam laporan</p>
								</div>
								<div class="card-body">
									<canvas id="Chart2" style="width: 100%;"></canvas>
									<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"></script>
									<script type="text/javascript">
									
									//ambil data laporan
									var pt =  <?php echo json_encode($pt) ?>;
									var gs =  <?php echo json_encode($gs) ?>;
									var bk =  <?php echo json_encode($bk) ?>;
									var mp =  <?php echo json_encode($mp) ?>;
									
									//eksekusi data laporan
									var ctx = document.getElementById('Chart2').getContext('2d');
									var grafiklaporans = new Chart(ctx, {
										type: 'bar',
										data: {
											labels: [
												'Grafik Penanganan Laporan Berdasarkan Aplikasi WBS BKSDA'
											],
											datasets: [{
												label: 'Penyimpangan dari tugas dan fungsi',
												data: [pt],
												backgroundColor: [
												'#8B0000'
												
												],
												hoverOffset: 4
											}, {
												label: 'Gratifikasi atau suap',
												data: [gs],
												backgroundColor: [
												'#00ff00'
												
												],
												hoverOffset: 4
											}, {
												label: 'Benturan kepentingan',
												data: [bk],
												backgroundColor: [
												'#0000ff'
												
												],
												hoverOffset: 4
											}, {
												label: 'Melanggar peraturan dan perundangan yang berlaku',
												data: [mp],
												backgroundColor: [
												'#ffff00'
												
												],
												hoverOffset: 4
											}], 
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
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Sebaran Provinsi Indonesia</div>
									<p>Berdasarkan laporan yang masuk ke aplikasi Whistleblowing System BKSDA, terdapat lokasi dalam peta dan jumlah laporan</p>
								</div>
								<div class="card-body">
									<div class="chart-container">
											<!-- map indo -->
										<div id="map"></div>
										<script type="text/javascript">
											//ambil data provinsi
											var Aceh =  <?php echo json_encode($AC) ?>;
											var Bali =  <?php echo json_encode($BA) ?>;
											var Banten =  <?php echo json_encode($BT) ?>;
											var Bengkulu =  <?php echo json_encode($BE) ?>;
											var Jogja =  <?php echo json_encode($YO) ?>;
											var Jakarta =  <?php echo json_encode($JK) ?>;
											var Gorontalo =  <?php echo json_encode($GO) ?>;
											var Jambi =  <?php echo json_encode($JA) ?>;
											var JawaBarat =  <?php echo json_encode($JB) ?>;
											var JawaTengah =  <?php echo json_encode($JT) ?>;
											var JawaTimur =  <?php echo json_encode($JI) ?>;
											var KalimantanBarat =  <?php echo json_encode($KB) ?>;
											var KalimantanSelatan =  <?php echo json_encode($KS) ?>;
											var KalimantanTengah =  <?php echo json_encode($KT) ?>;
											var KalimantanTimur =  <?php echo json_encode($KI) ?>;
											var KalimantanUtara =  <?php echo json_encode($KU) ?>;
											var KepBangka =  <?php echo json_encode($BB) ?>;
											var KepRiau =  <?php echo json_encode($KR) ?>;
											var Lampung =  <?php echo json_encode($LA) ?>;
											var Maluku =  <?php echo json_encode($MA) ?>;
											var MalukuUtara =  <?php echo json_encode($MU) ?>;
											var NusaTenggaraBarat =  <?php echo json_encode($NB) ?>;
											var NusaTenggaraTimur =  <?php echo json_encode($NT) ?>;
											var Papua =  <?php echo json_encode($PA) ?>;
											var PapuaBarat =  <?php echo json_encode($PB) ?>;
											var Riau =  <?php echo json_encode($RI) ?>;
											var SulawesiBarat =  <?php echo json_encode($SR) ?>;
											var SulawesiSelatan =  <?php echo json_encode($SN) ?>;
											var SulawesiTengah =  <?php echo json_encode($ST) ?>;
											var SulawesiTenggara =  <?php echo json_encode($SG) ?>;
											var SulawesiUtara =  <?php echo json_encode($SA) ?>;
											var SumatraBarat =  <?php echo json_encode($SB) ?>;
											var SumatraSelatan =  <?php echo json_encode($SS) ?>;
											var SumatraUtara =  <?php echo json_encode($SU) ?>;
											
											var simplemaps_countrymap_mapdata={
											main_settings: {
												//General settings
													width: "responsive", //or 'responsive'
												background_color: "#FFFFFF",
												background_transparent: "yes",
												border_color: "#ffffff",
												pop_ups: "detect",
												
													//State defaults
													state_description: "State description",
												state_color: "#88A4BC",
												state_hover_color: "#3B729F",
												state_url: "",
												border_size: 1.5,
												all_states_inactive: "no",
												all_states_zoomable: "yes",
												
													//Location defaults
													location_description: "Location description",
												location_url: "",
												location_color: "#FF0067",
												location_opacity: 0.8,
												location_hover_opacity: 1,
												location_size: 25,
												location_type: "square",
												location_image_source: "frog.png",
												location_border_color: "#FFFFFF",
												location_border: 2,
												location_hover_border: 2.5,
												all_locations_inactive: "no",
												all_locations_hidden: "no",
												
													//Label defaults
													label_color: "#d5ddec",
												label_hover_color: "#d5ddec",
												label_size: 22,
												label_font: "Arial",
												hide_labels: "no",
												hide_eastern_labels: "no",
											
													//Zoom settings
													zoom: "yes",
												manual_zoom: "yes",
												back_image: "no",
												initial_back: "no",
												initial_zoom: "-1",
												initial_zoom_solo: "no",
												region_opacity: 1,
												region_hover_opacity: 0.6,
												zoom_out_incrementally: "yes",
												zoom_percentage: 0.99,
												zoom_time: 0.5,
												
													//Popup settings
													popup_color: "white",
												popup_opacity: 0.9,
												popup_shadow: 1,
												popup_corners: 5,
												popup_font: "12px/1.5 Verdana, Arial, Helvetica, sans-serif",
												popup_nocss: "no",
												
													//Advanced settings
													div: "map",
												auto_load: "yes",
												url_new_tab: "no",
												images_directory: "default",
												fade_time: 0.1,
												link_text: "View Website"
											},
											state_specific: {
												IDN1136: {
												name: "Aceh",
												description: Aceh,
												color: "default",
												hover_color: "default",
												url: "default"
												},
												IDN1185: {
												name: "Kalimantan Timur",
												description: KalimantanTimur
												},
												IDN1223: {
												name: "Jawa Barat",
												description: JawaBarat
												},
												IDN1224: {
												name: "Jawa Tengah",
												description: JawaTengah
												},
												IDN1225: {
												name: "Bengkulu",
												description: Bengkulu
												},
												IDN1226: {
												name: "Banten",
												description: Banten
												},
												IDN1227: {
												name: "DKI Jakarta",
												description: Jakarta
												},
												IDN1228: {
												name: "Kalimantan Barat",
												description: KalimantanBarat
												},
												IDN1229: {
												name: "Lampung",
												description: Lampung
												},
												IDN1230: {
												name: "Sumatera Selatan",
												description: SumatraSelatan
												},
												IDN1231: {
												name: "Bangka-Belitung",
												description: KepBangka
												},
												IDN1232: {
												name: "Bali",
												description: Bali
												},
												IDN1233: {
												name: "Jawa Timur",
												description: JawaTimur
												},
												IDN1234: {
												name: "Kalimantan Selatan",
												description: KalimantanSelatan
												},
												IDN1235: {
												name: "Nusa Tenggara Timur",
												description: NusaTenggaraTimur
												},
												IDN1236: {
												name: "Sulawesi Selatan",
												description: SulawesiSelatan
												},
												IDN1237: {
												name: "Sulawesi Barat",
												description: SumatraBarat
												},
												IDN1796: {
												name: "Kepulauan Riau",
												description: KepRiau
												},
												IDN1837: {
												name: "Gorontalo",
												description: Gorontalo
												},
												IDN1930: {
												name: "Jambi",
												description: Jambi
												},
												IDN1931: {
												name: "Kalimantan Tengah",
												description: KalimantanTengah
												},
												IDN1933: {
												name: "Papua Barat",
												description:PapuaBarat
												},
												IDN381: {
												name: "Sumatera Utara",
												description: SumatraUtara
												},
												IDN492: {
												name: "Riau",
												description: Riau
												},
												IDN513: {
												name: "Sulawesi Utara",
												description: SulawesiUtara
												},
												IDN538: {
												name: "Maluku Utara",
												description: MalukuUtara
												},
												IDN539: {
												name: "Sumatera Barat" ,
												description: SumatraBarat
												},
												IDN540: {
												name: "DI Yogyakarta",
												description: Jogja
												},
												IDN554: {
												name: "Maluku",
												description: Maluku
												},
												IDN555: {
												name: "Nusa Tenggara Barat",
												description: NusaTenggaraBarat
												},
												IDN556: {
												name: "Sulawesi Tenggara",
												description: SulawesiTenggara
												},
												IDN557: {
												name: "Sulawesi Tengah",
												description: SulawesiTengah
												},
												IDN558: {
												name: "Papua",
												description: Papua
												}
											}
											};
										</script>
									</div>
									<div id="myChartLegend"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection