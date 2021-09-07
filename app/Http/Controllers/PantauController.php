<?php

namespace App\Http\Controllers;

use App\Laporan;
use Illuminate\Http\Request;

class PantauController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari') && $request->cari !="") {
            $laporans = Laporan::where('kodeunik', 'LIKE', $request->cari)->get();
        } else {
            $laporans = [];   
        }
        return view('pantau', ['laporans' => $laporans]);
    }
}
