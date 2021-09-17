@extends('layouts.app')
@section('content')
<!-- Single Page Start -->
<div class="single">
                <div class="container">
                    <div class="section-header">
                        <p>Kode Unik Anda</p>
                        <h2 style="font-weight:bold">{{ $laporan->kodeunik }}</h2>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h3>Detail Laporan Anda</h3> 
                            <ul class="list-group">
                              <li class="list-group-item">Nama Pelapor : {{ $laporan->namapelapor }}</li>
                              <li class="list-group-item">Status Laporan : {{ $laporan->status }}</li>
                              <li class="list-group-item">Email Pelapor : {{ $laporan->email }}</li>
                              <li class="list-group-item">Jenis Pelanggaran : {{ $laporan->jenispelanggaran }}</li>
                              <li class="list-group-item">Nama Terlapor : {{ $laporan->namaterlapor }}</li>
                              <li class="list-group-item">Tanggal Kejadian : {{ $laporan->tanggal }}</li>
                              <li class="list-group-item">Lokasi Kejadian : {{ $laporan->lokasi }}</li>
                              <li class="list-group-item">Kota/Kabupaten : {{ $laporan->kota }}</li>
                              <li class="list-group-item">Provinsi : {{ $laporan->provinsi }}</li>
                              <li class="list-group-item">Waktu Kejadian : {{ $laporan->waktu }}</li>
                              <li class="list-group-item">Tanggal dan Waktu Laporan Masuk : {{ $laporan->created_at }}</li>
                              <li class="list-group-item">Uraian : {{ $laporan->uraian }}</li>
                              <li class="list-group-item">Bukti: <a target="_blank" href="{{ url('storage/uploads/')}}/{{ $laporan->name }}" download>Unduh Bukti</a></li>
                            </ul>
                            <div class="tombol-tutup">
                                <a class="btn btn-primary" style="color:white;" href="{{ route('lapor') }}">Kembali</a>
                            </div>                         
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Page End -->
@endsection