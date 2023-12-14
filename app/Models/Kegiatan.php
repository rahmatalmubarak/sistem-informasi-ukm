<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'ormawa_id',
        'penanggung_jawab',
        'jenis',
        'tgl_mulai',
        'tgl_selesai',
        'tempat'
    ];
}
