@extends('layouts.admin')
@section('content')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Tabel Data Whistleblowing System BKSDA</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="{{ Route('admin-view') }}">
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
								<a href="{{ Route('selesai') }}">Laporan Selesai</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<!-- Tabel Laporan -->
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
                                            <thead>
												<tr>
													<th>No</th>
													<th>Judul</th>
													<th>Nama Pelapor</th>
													<th>Status</th>
													<th>Tanggal Masuk</th>
													<th>Terakhir Diubah</th>
													<th style="text-align:center">Tindakan</th>
												</tr>
											</thead>
                                            <tbody>
											@foreach ($laporans as $no => $laporan)
												<tr>
													<td>{{ ++$no + ($laporans->currentPage()-1) * $laporans->perPage()}}</td>
													<td>{{ $laporan->judul }}</td>
													<td>{{ $laporan->namapelapor }}</td>
													<td>{{ $laporan->status }}</td>
													<td>{{ $laporan->created_at }}</td>
													<td>{{ $laporan->updated_at }}</td>
													<td>
														<div class="form-button-action">
															<button class="btn btn-link btn-primary btn-lg"><a class="fa fa-eye" href="{{ route('laporans.show',$laporan->id) }}"> Tampilkan</a></button>
															<form action="{{ route('laporans.destroy',$laporan->id) }}" method="POST">
																<button type="submit"class="btn btn-link btn-danger"><a class="fa fa-trash">@csrf
																@method('DELETE') Hapus</a></button>
															</form>
														</div>
													</td>
												</tr>
											@endforeach
											</tbody>
										</table>
										{{ $laporans->links() }}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- batas 
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1><strong>Daftar Laporan</strong></h1>
            </div>
        </div>
    </div>


    <table class="table table-bordered">
        <tr>
            <th>Judul</th>
            <th>Nama Pelapor</th>
            <th>Email</th>
            <th>Jenis Pelanggaran</th>
            <th>Nama Terlapor</th>
            <th>Lokasi Kejadian</th>
            <th>Kota</th>
            <th>Provinsi</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Uraian</th>
            <th>Bukti</th>
        </tr>
        @foreach ($laporans as $laporan)
        <tr>
            <td>{{ $laporan->judul }}</td>
            <td>{{ $laporan->namapelapor }}</td>
            <td>{{ $laporan->email }}</td>
            <td>{{ $laporan->jenispelanggaran }}</td>
            <td>{{ $laporan->namaterlapor }}</td>
            <td>{{ $laporan->lokasi }}</td>
            <td>{{ $laporan->kota }}</td>
            <td>{{ $laporan->provinsi }}</td>
            <td>{{ $laporan->tanggal }}</td>
            <td>{{ $laporan->waktu }}</td>
            <td>{{ $laporan->uraian }}</td>
            <td>Lihat Bukti</td>   
            <td>
                <form action="{{ route('laporans.destroy',$laporan->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('laporans.show',$laporan->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('laporans.edit',$laporan->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
-->
@endsection