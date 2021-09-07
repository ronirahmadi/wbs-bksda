<?php

namespace App\Http\Controllers;

use App\Charts\StatistikChart;
use App\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StatistikController extends Controller
{

    public function index()
    {
        $penyimpangantugas = Laporan::where('jenispelanggaran','penyimpangan dari tugas dan fungsi')->get();
    	$gratifikasisuap = Laporan::where('jenispelanggaran','gratifikasi atau suap')->get();
    	$benturankepentingan = Laporan::where('jenispelanggaran','benturan kepentingan')->get();
        $melanggarperaturan = Laporan::where('jenispelanggaran','melanggar peraturan dan perundangan yang berlaku')->get();
    	$pt = count($penyimpangantugas);    	
    	$gs = count($gratifikasisuap);
    	$bk = count($benturankepentingan);
        $mp = count($melanggarperaturan);

        return view ('statistik',compact('pt','gs','bk','mp'));
    }
}
