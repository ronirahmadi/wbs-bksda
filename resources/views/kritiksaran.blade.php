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
								<a href="{{ Route('laporans.index') }}">Tabel Data Laporan</a>
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
													<th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Judul</th>
													<th>Keterangan</th>
													<th>Tanggal Masuk</th>
													<th style="text-align:center">Tindakan</th>
												</tr>
											</thead>
                                            <tbody>
											@foreach ($bantuans as $bantuan)
												<tr>
													<td>{{ $bantuan->id }}</td>
													<td>{{ $bantuan->nama }}</td>
													<td>{{ $bantuan->email }}</td>
													<td>{{ $bantuan->judul }}</td>
                                                    <td>{{ $bantuan->keterangan }}</td>
													<td>{{ $bantuan->created_at }}</td>
													<td>
														<div class="form-button-action">
															<!-- belum terdeteksi auto reply -->
															<button class="btn btn-link btn-primary btn-lg"><a class="fa fa-reply" href="mailto:$bantuans->email"> Kirim Tanggapan</a></button>
														</div>
													</td>
												</tr>
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection