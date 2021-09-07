<?php

namespace App\Http\Controllers;
use App\Satwa;
use Illuminate\Http\Request;

class SatwaController extends Controller
{
    public function index()
    {
        $satwas = Satwa::paginate(6);
        return view('satwa', compact('satwas'));
    }
}
