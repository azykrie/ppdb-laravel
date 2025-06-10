<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataSiswa extends Model
{
    protected $table = 'biodata_siswas';
    protected $fillable = [
        'user_id',
        'nisn',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'no_telepon',
        'asal_sekolah',
        'foto_nilai_rapor',
        'foto_ijazah',
        'foto_formal'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
