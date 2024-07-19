<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the data_orang_tua record associated with the user.
     */
    public function dataOrangTua()
    {
        return $this->hasOne(DataOrangTua::class, 'user_id');
    }
    public function dataPribadi()
    {
        return $this->hasOne(DataPribadi::class, 'user_id');
    }
    public function dataPendukung()
    {
        return $this->hasOne(DataPendukung::class, 'user_id');
    }

    public function hasPaid()
    {
        // Logika untuk memeriksa apakah pengguna telah melakukan pembayaran
        return $this->payments()->where('status', 'confirmed')->exists();
    }

    public function paymentConfirmed()
    {
        // Logika untuk memeriksa apakah pembayaran pengguna telah dikonfirmasi
        return $this->payments()->where('status', 'confirmed')->exists();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id');
    }
}