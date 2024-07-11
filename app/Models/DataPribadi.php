<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPribadi extends Model
{
    use HasFactory;
    protected $table = 'data_pribadi';
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'jenis_kelamin',
        'no_kk',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'kewarganegaraan',
        'berkebutuhan_khusus',
        'alamat',
        'rt',
        'rw',
        'dusun',
        'kelurahan',
        'kecamatan',
        'kode_pos',
        'tempat_tinggal',
        'mode_transportasi',
        'anak_ke',
        'status',
        'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
