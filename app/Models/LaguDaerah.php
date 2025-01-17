<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaguDaerah extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'lagu',
        'daerah',
        'image_url',
        'video_url'
    ];
}
