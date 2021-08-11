<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function poli()
    // {
    //     return $this->belongsTo(Poli::class);
    // }

    // public function dokter()
    // {
    //     return $this->belongsTo(Dokter::class);
    // }
}
