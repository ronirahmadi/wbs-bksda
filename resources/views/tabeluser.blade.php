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
								<a href="{{ route('tabeluser') }}">Tabel Data User</a>
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
													<th>Tanggal Mendaftar</th>
													<th style="text-align:center">Tindakan</th>
												</tr>
											</thead>
                                            <tbody>
											@foreach ($users as $no => $user)
												<tr>
													<td>{{ ++$no + ($users->currentPage()-1) * $users->perPage()}}</td>
													<td>{{ $user->name }}</td>
													<td>{{ $user->email }}</td>
													<td>{{ $user->created_at }}</td>
													<td>
														<div class="form-button-action">
                                                        <form action="{{ route('hapus',$user->id) }}" method="POST">
                                                            <button type="submit"class="btn btn-link btn-danger"><a class="fa fa-trash">@csrf
                                                            @method('DELETE') Hapus</a></button>
                                                        </form>
														</div>
													</td>
												</tr>
											@endforeach
											</tbody>
										</table>
                                        {{ $users->links() }}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection