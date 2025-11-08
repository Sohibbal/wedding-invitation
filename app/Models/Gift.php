<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    protected $fillable = [
        'user_id',
        'qr_label',
        'qris_image',
        'bank1_label',
        'bank1_number',
        'bank2_label',
        'bank2_number',
    ];
}