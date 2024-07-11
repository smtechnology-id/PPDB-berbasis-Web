<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendukung extends Model
{
    use HasFactory;
    protected $table = 'data_pendukung';

    protected $fillable = [
        'user_id',
        'tinggi_badan',
        'berat_badan',
        'lingkar_kepala',
        'jarak_tempuh',
        'waktu_tempuh',
        'jumlah_saudara',
        'berkas_passfoto',
        'berkas_akte',
        'berkas_kk',
        'ktp_ayah',
        'ktp_ibu',
        'status',
        'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
