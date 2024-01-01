<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'content',
        'kategori',
        'headline',
        'tgl_post',
        'gambar',
        'ormawa_id'
    ];

    public function ormawa()
    {
        return $this->belongsTo(Ormawa::class);
    }

    public function gambar()
    {
        return $this->hasMany(PhotoPostingan::class);
    }
}
