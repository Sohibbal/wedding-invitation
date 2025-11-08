<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $table = 'homes';

    protected $fillable = [
    'user_id',
    'judul',
    'lokasi_tanggal',
    'deskripsi',
    'ortu_pria',
    'nama_lengkap_pria',
    'ortu_wanita',
    'nama_lengkap_wanita',
    'foto_pria',
    'foto_wanita',
];

}
