<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{
    protected $table = 'guests'; // nama tabel di database
    protected $fillable = ['nama', 'tanggal','whatsapp','status', 'user_id'];
    // Guest model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
