<?php

namespace App\Http\Controllers;

use App\Bantuan;
use App\Laporan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search()
    {
    	return view('search');
    }

    public function selectSearch(Request $request)
    {
    	$laporans = [];

        if($request->has('q')){
            $search = $request->q;
            $laporans =Laporan::select("id", "judul")
            		->where('judul', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($laporans);
    }
    
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminView()
    {
        //laporan
        $laporans = Laporan::take(6)->get();
        
        // jumlah data dashboard admin
        $lolos = DB::table('laporans')->where('status', '=', 'lolos verifikasi')->count();

        $selesai = DB::table('laporans')->where('status', '=', 'laporan selesai')->count();

        $ditolak = DB::table('laporans')->where('status', '=', 'tidak lolos verifikasi')->count();

        $belumdiverifikasi = DB::table('laporans')->where('status', '=', 'menunggu proses verifikasi')->count();

        // notifikasi lonceng laporan belum diverifikasi
        $notif = Laporan::where('status', '=', 'menunggu proses verifikasi')->take(4)->orderBy('created_at', 'desc')->get();

        //jumlah total laporan masuk
        $laporanmasuk = DB::table('laporans')->count();

        //jumlah user
        $userterdaftar = DB::table('users')->where('is_admin', '=', 'false')->count();
        
        // grafik laporan
        $grafiklaporans = Laporan::selectRaw("to_char(created_at, 'YYYY-MM') as month, count(*) as count")
                ->whereYear('created_at', now()->year)
                ->groupBy('month')
                ->pluck('count');

        //grafiklaporan diproses
        $grafiklaporansdiproses = Laporan::where('status', '=', 'lolos verifikasi')
                ->selectRaw("to_char(updated_at, 'YYYY-MM') as month, count(*) as count")
                ->whereYear('updated_at', now()->year)
                ->groupBy('month')
                ->pluck('count');        
        
        //grafik laporan ditolak
        $grafiklaporansditolak = Laporan::where('status', '=', 'tidak lolos verifikasi')
                ->selectRaw("to_char(updated_at, 'YYYY-MM') as month, count(*) as count")
                ->whereYear('updated_at', now()->year)
                ->groupBy('month')
                ->pluck('count');

        return view ('admin-view', compact('notif'), ['userterdaftar' => $userterdaftar, 'laporanmasuk' => $laporanmasuk, 'laporans' => $laporans,'grafiklaporans' => $grafiklaporans, 'grafiklaporansdiproses' => $grafiklaporansdiproses,'grafiklaporansditolak' => $grafiklaporansditolak, 'lolos' => $lolos, 'selesai' => $selesai, 'ditolak' => $ditolak, 'belumdiverifikasi' => $belumdiverifikasi
        ]);
    }

    public function grafiklaporan()
    {
        $laporans = Laporan::all();
        
        $belumdiverifikasi = DB::table('laporans')->where('status', '=', 'menunggu proses verifikasi')->count();
        
        // notifikasi lonceng laporan belum diverifikasi
        $notif = Laporan::where('status', '=', 'menunggu proses verifikasi')->take(4)->orderBy('created_at', 'desc')->get();
        
        // grafik laporan
        $grafiklaporans = Laporan::selectRaw("to_char(created_at, 'YYYY-MM') as month, count(*) as count")
                ->whereYear('created_at', now()->year)
                ->groupBy('month')
                ->pluck('count');

        //grafiklaporan diproses
        $grafiklaporansdiproses = Laporan::where('status', '=', 'lolos verifikasi')
                ->selectRaw("to_char(updated_at, 'YYYY-MM') as month, count(*) as count")
                ->whereYear('updated_at', now()->year)
                ->groupBy('month')
                ->pluck('count');        
        
        //grafik laporan ditolak
        $grafiklaporansditolak = Laporan::where('status', '=', 'tidak lolos verifikasi')
                ->selectRaw("to_char(updated_at, 'YYYY-MM') as month, count(*) as count")
                ->whereYear('updated_at', now()->year)
                ->groupBy('month')
                ->pluck('count');

        //grafik laporan provinsi
        $AC = Laporan::where('provinsi', '=', '11')->count();
        $BA = Laporan::where('provinsi', '=', '51')->count();
        $BT = Laporan::where('provinsi', '=', '36')->count();
        $BE = Laporan::where('provinsi', '=', '17')->count();
        $YO = Laporan::where('provinsi', '=', '34')->count();
        $JK = Laporan::where('provinsi', '=', '31')->count();
        $GO = Laporan::where('provinsi', '=', '75')->count();
        $JA = Laporan::where('provinsi', '=', '15')->count();
        $JB = Laporan::where('provinsi', '=', '32')->count();
        $JT = Laporan::where('provinsi', '=', '33')->count();
        $JI = Laporan::where('provinsi', '=', '35')->count();
        $KB = Laporan::where('provinsi', '=', '61')->count();
        $KS = Laporan::where('provinsi', '=', '63')->count();
        $KT = Laporan::where('provinsi', '=', '62')->count();
        $KI = Laporan::where('provinsi', '=', '64')->count();
        $KU = Laporan::where('provinsi', '=', '65')->count();
        $BB = Laporan::where('provinsi', '=', '19')->count();
        $KR = Laporan::where('provinsi', '=', '21')->count();
        $LA = Laporan::where('provinsi', '=', '18')->count();
        $MA = Laporan::where('provinsi', '=', '81')->count();
        $MU = Laporan::where('provinsi', '=', '82')->count();
        $NB = Laporan::where('provinsi', '=', '52')->count();
        $NT = Laporan::where('provinsi', '=', '53')->count();
        $PA = Laporan::where('provinsi', '=', '94')->count();
        $PB = Laporan::where('provinsi', '=', '91')->count();
        $RI = Laporan::where('provinsi', '=', '14')->count();
        $SR = Laporan::where('provinsi', '=', '76')->count();
        $SN = Laporan::where('provinsi', '=', '73')->count();
        $ST = Laporan::where('provinsi', '=', '72')->count();
        $SG = Laporan::where('provinsi', '=', '74')->count();
        $SA = Laporan::where('provinsi', '=', '71')->count();
        $SB = Laporan::where('provinsi', '=', '13')->count();
        $SS = Laporan::where('provinsi', '=', '16')->count();
        $SU = Laporan::where('provinsi', '=', '12')->count();
        //dd($a);

        //grafik bar jenis pelanggaran
        $penyimpangantugas = Laporan::where('jenispelanggaran','penyimpangan dari tugas dan fungsi')->get();
    	$gratifikasisuap = Laporan::where('jenispelanggaran','gratifikasi atau suap')->get();
    	$benturankepentingan = Laporan::where('jenispelanggaran','benturan kepentingan')->get();
        $melanggarperaturan = Laporan::where('jenispelanggaran','melanggar peraturan dan perundangan yang berlaku')->get();
    	$pt = count($penyimpangantugas);    	
    	$gs = count($gratifikasisuap);
    	$bk = count($benturankepentingan);
        $mp = count($melanggarperaturan);

        //grafik pie status
        $belum = Laporan::where('status','menunggu proses verifikasi')->get();
    	$lolos = Laporan::where('status','lolos verifikasi')->get();
    	$tolak = Laporan::where('status','tidak lolos verifikasi')->get();
        $beres = Laporan::where('status','laporan selesai')->get();
    	$bv = count($belum);    	
    	$ll = count($lolos);
    	$tl = count($tolak);
        $sl = count($beres);

        return view ('grafiklaporan', compact('laporans','notif','pt','gs','bk','mp','bv','ll','tl','sl'), ['grafiklaporans' => $grafiklaporans, 'grafiklaporansdiproses' => $grafiklaporansdiproses,'grafiklaporansditolak' => $grafiklaporansditolak,'belumdiverifikasi' => $belumdiverifikasi,
            //definisikan provinsi
            'AC' => $AC, 'BA' => $BA, 'BT' => $BT, 'BE' => $BE, 'YO' => $YO, 'JK' => $JK, 'GO' => $GO, 'JA' => $JA, 'JB' => $JB, 'JT' => $JT, 'JI' => $JI, 'KB' => $KB, 'KS' => $KS, 'KT' => $KT, 'KI' => $KI, 'KU' => $KU, 'BB' => $BB,
            'KR' => $KR, 'LA' => $LA, 'MA' => $MA, 'MU' => $MU, 'NB' => $NB, 'NT' => $NT, 'PA' => $PA, 'PB' => $PB, 'RI' => $RI, 'SR' => $SR, 'SN' => $SN, 'ST' => $ST, 'SG' => $SG, 'SA' => $SA, 'SB' => $SB, 'SS' => $SS, 'SU' => $SU
        ]);
    }

    public function kritiksaran()
    {
        $laporans = Laporan::all();
        
        $bantuans = Bantuan::all();

        // notifikasi lonceng laporan belum diverifikasi
        $belumdiverifikasi = DB::table('laporans')->where('status', '=', 'menunggu proses verifikasi')->count();

        $notif = Laporan::where('status', '=', 'menunggu proses verifikasi')->take(4)->get();

        return view('kritiksaran', compact('laporans','bantuans', 'notif'), ['belumdiverifikasi' => $belumdiverifikasi]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notif = Laporan::where('status', '=', 'menunggu proses verifikasi')->take(4)->orderBy('created_at', 'desc')->get();

        $laporans = Laporan::where('status', '=', 'menunggu proses verifikasi')->orderBy('created_at', 'asc')->paginate(10);

        // notifikasi lonceng laporan belum diverifikasi
        $belumdiverifikasi = DB::table('laporans')->where('status', '=', 'menunggu proses verifikasi')->count();

        return view('laporans.index',compact('laporans', 'notif'), ['belumdiverifikasi' => $belumdiverifikasi]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function diproses()
    {
        $notif = Laporan::where('status', '=', 'menunggu proses verifikasi')->take(4)->orderBy('created_at', 'desc')->get();

        $laporans = Laporan::where('status', '=', 'lolos verifikasi')->orderBy('created_at', 'asc')->paginate(10);

        // notifikasi lonceng laporan belum diverifikasi
        $belumdiverifikasi = DB::table('laporans')->where('status', '=', 'menunggu proses verifikasi')->count();

        return view('diproses',compact('laporans', 'notif'), ['belumdiverifikasi' => $belumdiverifikasi]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ditolak()
    {
        $notif = Laporan::where('status', '=', 'menunggu proses verifikasi')->take(4)->orderBy('created_at', 'desc')->get();

        $laporans = Laporan::where('status', '=', 'tidak lolos verifikasi')->orderBy('updated_at', 'desc')->paginate(10);

        // notifikasi lonceng laporan belum diverifikasi
        $belumdiverifikasi = DB::table('laporans')->where('status', '=', 'menunggu proses verifikasi')->count();

        return view('ditolak',compact('laporans', 'notif'), ['belumdiverifikasi' => $belumdiverifikasi]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selesai()
    {
        $notif = Laporan::where('status', '=', 'menunggu proses verifikasi')->take(4)->orderBy('created_at', 'desc')->get();

        $laporans = Laporan::where('status', '=', 'laporan selesai')->orderBy('updated_at', 'desc')->paginate(10);

        // notifikasi lonceng laporan belum diverifikasi
        $belumdiverifikasi = DB::table('laporans')->where('status', '=', 'menunggu proses verifikasi')->count();

        return view('selesai',compact('laporans', 'notif'), ['belumdiverifikasi' => $belumdiverifikasi]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function penyimpangan()
    {
        $notif = Laporan::where('status', '=', 'menunggu proses verifikasi')->take(4)->orderBy('created_at', 'desc')->get();

        $laporans = Laporan::where('jenispelanggaran', '=', 'penyimpangan dari tugas dan fungsi')->orderBy('created_at', 'desc')->paginate(10);

        // notifikasi lonceng laporan belum diverifikasi
        $belumdiverifikasi = DB::table('laporans')->where('status', '=', 'menunggu proses verifikasi')->count();

        return view('jenis.penyimpangan',compact('laporans', 'notif'), ['belumdiverifikasi' => $belumdiverifikasi]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gratifikasi()
    {
        $notif = Laporan::where('status', '=', 'menunggu proses verifikasi')->take(4)->orderBy('created_at', 'desc')->get();

        $laporans = Laporan::where('jenispelanggaran', '=', 'gratifikasi atau suap')->orderBy('created_at', 'desc')->paginate(10);

        // notifikasi lonceng laporan belum diverifikasi
        $belumdiverifikasi = DB::table('laporans')->where('status', '=', 'menunggu proses verifikasi')->count();

        return view('jenis.gratifikasi',compact('laporans', 'notif'), ['belumdiverifikasi' => $belumdiverifikasi]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function benturan()
    {
        $notif = Laporan::where('status', '=', 'menunggu proses verifikasi')->take(4)->orderBy('created_at', 'desc')->get();

        $laporans = Laporan::where('jenispelanggaran', '=', 'benturan kepentingan')->orderBy('created_at', 'desc')->paginate(10);

        // notifikasi lonceng laporan belum diverifikasi
        $belumdiverifikasi = DB::table('laporans')->where('status', '=', 'menunggu proses verifikasi')->count();

        return view('jenis.benturan',compact('laporans', 'notif'), ['belumdiverifikasi' => $belumdiverifikasi]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function melanggar()
    {
        $notif = Laporan::where('status', '=', 'menunggu proses verifikasi')->take(4)->orderBy('created_at', 'desc')->get();

        $laporans = Laporan::where('jenispelanggaran', '=', 'melanggar peraturan dan perundangan yang berlaku')->orderBy('created_at', 'desc')->paginate(10);

        // notifikasi lonceng laporan belum diverifikasi
        $belumdiverifikasi = DB::table('laporans')->where('status', '=', 'menunggu proses verifikasi')->count();

        return view('jenis.melanggar',compact('laporans', 'notif'), ['belumdiverifikasi' => $belumdiverifikasi]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tabeluser()
    {
        $notif = Laporan::where('status', '=', 'menunggu proses verifikasi')->take(4)->orderBy('created_at', 'desc')->get();

        $laporans = Laporan::all();

        $users = User::where('is_admin')->orderBy('name', 'asc')->paginate(10);

        // notifikasi lonceng laporan belum diverifikasi
        $belumdiverifikasi = DB::table('laporans')->where('status', '=', 'menunggu proses verifikasi')->count();

        return view('tabeluser',compact('laporans','users', 'notif'), ['belumdiverifikasi' => $belumdiverifikasi]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        $laporans = Laporan::all();
        
        // notifikasi lonceng laporan belum diverifikasi
        $belumdiverifikasi = DB::table('laporans')->where('status', '=', 'menunggu proses verifikasi')->count();
        
        $notif = Laporan::where('status', '=', 'menunggu proses verifikasi')->take(4)->orderBy('created_at', 'desc')->get();

        return view('laporans.show',compact('laporans', 'laporan', 'notif'), ['belumdiverifikasi' => $belumdiverifikasi]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        $laporans = Laporan::all();
        
        // notifikasi lonceng laporan belum diverifikasi
        $belumdiverifikasi = DB::table('laporans')->where('status', '=', 'menunggu proses verifikasi')->count();
        
        $notif = Laporan::where('status', '=', 'menunggu proses verifikasi')->take(4)->orderBy('created_at', 'desc')->get();
        
        return view('laporans.edit',compact('laporans', 'laporan', 'notif'), ['belumdiverifikasi' => $belumdiverifikasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Laporan::where('id', $id)->update([
            'status' => $request->get('status')
        ]);

        return back()->with('Berhasil','Laporan Telah Diverifikasi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $delete = Laporan::find($id);
        unlink('storage/uploads/'.$delete->name);
        $delete->delete();
         
        return redirect()->route('laporans.index')->with('success','laporan deleted successfully');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {        
        $delete = User::find($id);
        $delete->delete();
         
        return redirect()->route('tabeluser')->with('success','user deleted successfully');  
    }

}
