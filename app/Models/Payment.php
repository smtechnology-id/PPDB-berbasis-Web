<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'sekolah_tujuan',
        'jumlah_pembayaran',
        'bukti_pembayaran',
        'status',
        'tanggal',
        'metode_pembayaran',
        'keterangan',   
    ];

    /**
     * Get the user that owns the payment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}