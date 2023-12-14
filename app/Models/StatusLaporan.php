<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLaporan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'laporan_id',
        'status',
        'catatan',
        'sk',
    ];



    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }
}
