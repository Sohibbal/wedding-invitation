<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'temporary_upload_id', 'caption'];

    public function image()
    {
        return $this->belongsTo(TemporaryUpload::class, 'temporary_upload_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
