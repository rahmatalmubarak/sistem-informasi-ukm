<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $fillable =[
        'ormawa_id',
        'nama',
        'email',
        'nim',
        'kontak',
        'kelas',
        'kepengurusan_sebelumnya',
        'tujuan',
        'file_syarat',
        'konfirmasi',
    ];

    public function ormawa(){
        return $this->belongsTo(Ormawa::class);
    }
}
