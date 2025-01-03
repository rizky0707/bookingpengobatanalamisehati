<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatJalan extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }

    public function booking()
    {
        return $this->hasMany(booking::class);
    }

    
    public function obat()
    {
        return $this->belongsToMany(Obat::class, 'rawat_jalan_obat')->withPivot('jumlah');
    }

    public function diagnosa()
    {
        return $this->hasMany(RawatJalanDiagnosa::class, 'booking_id', 'booking_id');
    }

    

    protected $fillable = [
        'nama',
        'pelayanan',
        'jam',
        'tanggal',
        'keluhan',
        'status',
        'tensi',
        'gula_darah',
        'kolesterol',
        'asam_urat',
        'penyakit',
        'obat',
        'jumlah',
        'cek_anamnesa',
        'booking_id',
        'user_id',
    ];

    
}
