<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nama_sekolah',
        'alamat_sekolah',
        'gambar_sekolah',
        'visi_misi',
        'moto_sekolah',
    ];
}
