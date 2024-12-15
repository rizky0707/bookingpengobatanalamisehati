<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatJalanDiagnosa extends Model
{
    use HasFactory;

    protected $table = 'rawat_jalan_diagnosa';

    public function rawatJalan()
    {
        return $this->belongsTo(RawatJalan::class, 'booking_id', 'booking_id');
    }

    public function obat()
    {
        return $this->hasMany(RawatJalanObat::class, 'rawat_jalan_diagnosa_id', 'id');
    }

    // Relasi ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function obats()
{
    return $this->belongsToMany(Obat::class, 'rawat_jalan_obat', 'rawat_jalan_diagnosa_id', 'obat_id')
                ->withPivot('jumlah'); // Menambahkan kolom 'jumlah' dari pivot
}


    // Relasi ke tabel Booking
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'id');
    }

    

    protected $fillable = [
        'penyakit',
        'booking_id',
        'user_id',
    ];
}
