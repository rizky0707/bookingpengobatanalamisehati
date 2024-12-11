<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable
{
    use HasApiTokens,  HasFactory, Notifiable;

    public function komfirmasiPembayarans()
    {   
        return $this->hasMany(KomfirmasiPembayaran::class);
    }

    public function bookings()
    {   
        return $this->hasMany(Booking::class);
    }

    public function rawatJalans()
    {   
        return $this->hasMany(RawatJalan::class);
    }

    public function last_booking()
{
    return $this->hasOne(Booking::class)->latest();  // Mengambil booking terakhir berdasarkan waktu
}

public function last_rawatJalan()
{
    return $this->hasOne(RawatJalan::class)->latest();  // Mengambil booking terakhir berdasarkan waktu
}
    

    protected $fillable = [
        'no_rm',
        'name',
        'nik',
        'email',
        'no_hp',
        'jenis_kelamin',
        'tempat',
        'tanggal_lahir',
        'alamat',
        'password',
        'is_admin',
        'is_active',
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
    ];
}
