<?php

namespace App\Http\Controllers;

use App\Laporan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
{

    public function getProvinsi()
    {
        $provinsi = DB::table('indonesia_provinces')->pluck("name","id");
        return view('lapor',compact('provinsi'));
    }

    public function getKota($id) 
    {
        $kota = DB::table("indonesia_cities")->where("province_id",$id)->pluck("name","id");
        return json_encode($kota);
    }

    public function getKec($id) 
    {
        $kecamatan = DB::table("indonesia_districts")->where("city_id",$id)->pluck("name","id");
        return json_encode($kecamatan);
    }
    
    public function getDes($id) 
    {
        $kelurahan = DB::table("indonesia_villages")->where("district_id",$id)->pluck("name","id");
        return json_encode($kelurahan);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->has('cari') && $request->cari !="") {
            $laporans = Laporan::where('kodeunik', 'LIKE', $request->cari)->get();
        } else {
            $laporans = [];   
        }
        return view('laporans.create', ['laporans' => $laporans]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, Laporan $laporan)
    {        
        $request->validate([
            'judul' => 'required',
            'namapelapor' => 'required',
            'jenispelanggaran' => 'required',
            'namaterlapor' => 'required',
            'lokasi' => 'required' ,
            'kecamatan' => 'required',
            'kota' => 'required' ,
            'provinsi' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'uraian' => 'required',
            'file' => 'required|file|mimes:jpeg,png,jpg,zip,docx,doc,rar,xls,xlsx,ppt,pptx,pdf,avi,mp4,3gp,mp3,mkv|max:10000'
          ]); 

          $laporan = new Laporan();

          $laporan->judul = $request->input('judul');
          $laporan->namapelapor = $request->input('namapelapor');
          $laporan->email = $request->input('email');
          $laporan->jenispelanggaran = $request->input('jenispelanggaran');
          $laporan->namaterlapor = $request->input('namaterlapor');
          $laporan->lokasi = $request->input('lokasi');
          $laporan->kelurahan = $request->input('kelurahan');
          $laporan->kecamatan = $request->input('kecamatan');
          $laporan->kota = $request->input('kota');
          $laporan->provinsi = $request->input('provinsi');
          $laporan->tanggal = $request->input('tanggal');
          $laporan->waktu = $request->input('waktu');
          $laporan->uraian = $request->input('uraian');
          $laporan->kodeunik = Str::random(10);
          $laporan->status = 'menunggu proses verifikasi';

          if ($request->file('file')) 
            $laporanPath = $request->file('file');
            $laporanName = $laporanPath->getClientOriginalName();
  
            $path = $request->file('file')->storeAs('uploads', $laporanName, 'public');
  
          $laporan->name = $laporanName;
          $laporan->path = '/storage/'.$path;
          $laporan->save($request->all());

          //return response()->json(array('success' => true, 'last_insert_id' => $laporan->kodeunik), 200);
          Alert::success('Laporan Anda Telah Terkirim', 'Silahkan pantau laporan anda melalui halaman pantau dengan kode unik.');
          return redirect('detail-lapor/'.$laporan->id);
          return response()->json($laporan);                                                  
    }

    public function detaillapor($id)
    {        
        $laporan = Laporan::find($id);

        return view('detail-lapor',['laporan' => $laporan]);
    }

    //membuat api
    public function tampilkanapi()
    {
        $laporans = Laporan::all();

        return response()->json($laporans);
    }

}
