<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $table = 'infos'; // atau 'info' jika nama tabel tunggal

    protected $fillable = [
    'user_id',
    'tanggal_akad',
    'jam_akad',
    'tanggal_resepsi',
    'jam_resepsi',
    'alamat',
    'google_maps',
];


    // Jika kamu ingin cast otomatis ke tipe date
    protected $casts = [
        'tanggal_akad' => 'date',
        'tanggal_resepsi' => 'date',
    ];
}
