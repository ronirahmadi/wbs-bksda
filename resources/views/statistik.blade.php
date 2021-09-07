@extends('layouts.app')
@section('content')
<!-- Single Page Start -->
<div class="single">
    <div class="container">
        <div class="section-header">
            <h2>Grafik Penanganan Laporan</h2>
            <p>Berikut ini adalah grafik penanganan laporan melalui aplikasi WBS BKSDA</p>
        </div>
        <div class="row">
            <div class="col-12">	
                <p>
                    Laporan yang masuk melalui aplikasi WBS internal BKSDA akan ditindak lanjuti selambat-lambatnya 7 (tujuh) hari kerja terhitung sejak laporan diterima. Terdapat 4 (empat) kategori dalam penanganan laporan melalui WBS internal BKSDA yaitu :
                </p>
                <ul class="list-group">
                    <li class="list-group-item">1. <strong>Laporan Diterima</strong> yaitu laporan yang memenuhi syarat sesuai dengan ketentuan yang telah ditetapkan dalam aplikasi WBS Internal BKSDA.</li>
                    <li class="list-group-item">2. <strong>Laporan Tidak Lolos verifikasi</strong> yaitu laporan yang <strong style="color: red;">tidak memenuhi syarat</strong>  yang telah ditetapkan dalam aplikasi WBS Internal BKSDA.</li>
                    <li class="list-group-item">3. <strong>Laporan Lolos verifikasi</strong> yaitu laporan yang memenuhi syarat dan mendapat respon dari verifikator administrator WBS internal BKSDA dimana laporan siap untuk diproses (ditindak lanjuti).</li>
                    <li class="list-group-item">4. <strong>Laporan Selesai</strong> yaitu laporan yang telah selesai diproses.</li>
                </ul>
                <canvas id="Chart1" style="width: 100%;"></canvas>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"></script>
                <script type="text/javascript">
                
                //ambil data laporan
                var pt =  <?php echo json_encode($pt) ?>;
                var gs =  <?php echo json_encode($gs) ?>;
                var bk =  <?php echo json_encode($bk) ?>;
                var mp =  <?php echo json_encode($mp) ?>;
                
                //eksekusi data laporan
                var ctx = document.getElementById('Chart1').getContext('2d');
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
</div>
@endsection