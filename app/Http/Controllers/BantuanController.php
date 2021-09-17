<?php

namespace App\Http\Controllers;

use App\Bantuan;
use Illuminate\Http\Request;

class BantuanController extends Controller
{
    public function index()
    {
        return view('bantuan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, Bantuan $bantuan)
    {        
        $request->validate([
            'judul' => 'required',
            'email' => 'required',
            'judul' => 'required',
            'keterangan' => 'required',
          ]);

          $bantuan = new Bantuan();

          $bantuan->nama = $request->input('nama');
          $bantuan->email = $request->input('email');
          $bantuan->judul = $request->input('judul');
          $bantuan->keterangan = $request->input('keterangan');

          $bantuan->save($request->all());

          return redirect()->route('bantuan')->with('Berhasil','Keluhan anda telah terkirim, tunggu admin kami mengirimkan respon.');
          return response()->json();                                                  
    }
}
