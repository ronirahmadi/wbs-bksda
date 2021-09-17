@extends('layouts.admin')
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
								<a href="{{ Route('laporans.index') }}">Tabel Data Laporan</a>
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
								<a href="">Nomor ID {{ $laporan->id }}</a>
							</li>
						</ul>
                        <div class="col-xs-12 col-sm-12 col-md-4 text-center">
                            <div class="">
                                <a class="btn btn-primary" style="color:white;" value="Back" onclick="location.reload(true);history.go(-2);">Kembali</a>
                            </div>
                        </div>
					</div>
					@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('laporans.update', [$laporan->id]) }}" method="POST">
                    @csrf

                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Judul:</strong>
                                {{ $laporan->judul }}
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
                                <strong>Email:</strong>
                                {{ $laporan->email }}    
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Jenis Pelanggaran:</strong>
                                {{ $laporan->jenispelanggaran }}
                                </select>
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
                                <strong>Lokasi Kejadian:</strong>
                                {{ $laporan->lokasi }}    
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Kota:</strong>
                                {{ $laporan->kota }}    
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Provinsi:</strong>
                                {{ $laporan->provinsi }}    
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Tanggal:</strong>
                                {{ $laporan->tanggal }}    
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Waktu:</strong>
                                {{ $laporan->waktu }}    
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            <strong>uraian:</strong>
                            {{ $laporan->uraian }}    
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Status:</strong>
                                {{ $laporan->status }}                           
                                <input type="text" name="status" class="form-control" placeholder="{{ $laporan->status }}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>    
@endsection