<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
     protected $fillable = ['user_id', 'nama_pria', 'nama_wanita', 'tanggal_acara'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
