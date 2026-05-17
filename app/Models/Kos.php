<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    protected $table = 'kos';

    protected $fillable = [
        'nama_kos',
        'alamat',
        'harga',
        'jumlah_kamar'
    ];
}