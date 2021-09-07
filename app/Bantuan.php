<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    protected $table = 'bantuans';

    protected $fillable = [
        'nama', 'email', 'judul', 'keterangan'
    ];
}
