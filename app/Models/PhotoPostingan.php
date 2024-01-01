<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoPostingan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function postingans(){
        return $this->belongsTo(Postingan::class);
    }
}
