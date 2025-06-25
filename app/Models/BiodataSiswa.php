<?php

namespace App\Models;

use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataSiswa extends Model
{
    use HasFactory;

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
        'foto_formal',
        'verification_status',
        'verification_notes',
        'verified_by_user_id',
        'verified_at',
        'jurusan',
    ];

    /**
     * Get the user (siswa) that owns the biodata.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }

    /**
     * Get the admin user who verified this biodata.
     */
    public function verifiedBy()
    {
        return $this->belongsTo(User::class, 'verified_by_user_id');
    }
}
