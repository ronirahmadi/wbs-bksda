@extends('layouts.app')
@section('content')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Detail Laporan</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="{{ route('admin-view') }}">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Tabel Data Laporan</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Detail Laporan</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="{{ $laporan->id }}">Nomor ID {{ $laporan->id }}</a>
							</li>
						</ul>
					</div>
					<div class="page-category">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Judul:</strong>
									{{ $laporan->judul }}
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Tanggal Kejadian:</strong>
									{{ $laporan->tanggal }}
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Nama Pelapor:</strong>
									{{ $laporan->namapelapor }}
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Kode Unik:</strong>
									{{ $laporan->kodeunik }}
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Email:</strong>
									{{ $laporan->email }}
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Jenis Pelanggaran:</strong>
									{{ $laporan->jenispelanggaran }}
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Nama Terlapor:</strong>
									{{ $laporan->namaterlapor }}
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Lokasi:</strong>
									{{ $laporan->lokasi }}
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Kota:</strong>
									{{ $laporan->provinsi }}
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Waktu Kejadian:</strong>
									{{ $laporan->judul }}
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Uraian:</strong>
									{{ $laporan->uraian }}
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Bukti:</strong><a target="_blank" href="{{ url('storage/uploads/')}}/{{ $laporan->name }}" download>
									Unduh Bukti</a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Status:</strong><a>
									{{ $laporan->status }}</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 margin-tb">
								<div class="pull-right">
									<a class="btn btn-primary" style="color:white;" value="Back" onclick="history.go(-1);">Kembali</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection