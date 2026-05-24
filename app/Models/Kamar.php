<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';

    protected $fillable = [
        'kos_id',
        'nomor_kamar',
        'status',
        'luas',
    ];

    // Relasi: kamar belongsTo kos
    public function kos()
    {
        return $this->belongsTo(Kos::class, 'kos_id');
    }
}