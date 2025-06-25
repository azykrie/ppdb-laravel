<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'order_id',
        'biodata_siswa_id',
        'price',
        'status',
        'snap_token',
    ];

    public function biodataSiswa()
    {
        return $this->belongsTo(BiodataSiswa::class);
    }
}
