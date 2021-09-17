<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporans';

    protected $fillable = [
        'judul', 'namapelapor', 'email', 'jenispelanggaran', 'namaterlapor', 'lokasi', 'kelurahan',
        'kecamatan', 'kota', 'provinsi', 'tanggal', 'waktu', 'uraian', 'name', 'path'
    ];
}
