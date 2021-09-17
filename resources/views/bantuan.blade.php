@extends('layouts.app')
@section('content')
<!-- Contact Start -->
<div class="contact">
    <div class="container">
        <div class="section-header">
            <h2>FAQs / Kritik & Saran</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="faqs">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                    <span>1</span> Apa itu WBS BKSDA?
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                <div class="card-body">
                                Whistleblowing System BKSDA adalah sistem untuk memproses laporan yang dapat dimanfaatkan oleh pelapor untuk melaporkan dugaan pelanggaran yang dilakukan oleh ASN di lingkungan BKSDA dan kerahasiaan identitas pelapor dijamin serta diberikan perlindungan oleh Kementerian Lingkungan Hidup dan Kehutanan Republik Indonesia.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseTwo">
                                    <span>2</span> Apa Manfaat Whistleblowing System?
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                Karena Whistleblowing mencakup budaya transparan yang mendorong pelaporan suatu pelanggaran. Selain transparansi, BKSDA memastikan bahwa sistem whistleblowing melindungi kerahasiaan pelapor. Sehingga pelapor merasa cukup aman dari segala bentuk pembalasan untuk melaporkan kekhawatirannya.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseThree">
                                    <span>3</span> Bagaimana Penanganan Laporan?
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                Setelah laporan diterima Tim WBS akan memproses laporan kemudian melakukan validasi laporan, laporan “bukan pelanggaran” atau “sampah” akan dihapuskan dari Sistem WBS sedangkan laporan yang dikategorikan sebagai “pelanggaran” akan ditindaklanjuti. 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-form">
                    <form action="{{ route('bantuan.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input name="nama" type="text" class="form-control" placeholder="Nama Anda" required="required" />
                            </div>
                            <div class="form-group col-md-6">
                                <input name="email" type="email" class="form-control" placeholder="Alamat E-mail" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="judul" type="text" class="form-control" placeholder="Judul" required="required" />
                        </div>
                        <div class="form-group">
                            <textarea name="keterangan" class="form-control" rows="6" placeholder="Keterangan" required="required" ></textarea>
                        </div>
                        <div><button class="btn" type="submit">Kirim Pendapat</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection