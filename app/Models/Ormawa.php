<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ormawa extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'logo',
        'deskripsi'
    ];

    public function pendaftar()
    {
        return $this->hasOne(Pendaftar::class);
    }

    public function laporan()
    {
        return $this->hasOne(Laporan::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function postingan()
    {
        return $this->hasOne(Postingan::class);
    }
    
}
