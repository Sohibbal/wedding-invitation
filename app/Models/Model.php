<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'judul', 'lokasi_tanggal', 'deskripsi', 'ortu_pria', 'ortu_wanita'];
}
