<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }

    // public function category()
    // {
    //     return $this->belongsTo(CategoryService::class, 'id_category');
    // }

    // public function doctor()
    // {
    //     return $this->belongsTo(Doctor::class, 'id_doctor');
    // }

    public function tarif()
    {
        return $this->belongsTo(Tarif::class, 'id_tarif');
    }

    // public function rawatJalan()
    // {   
    //     return $this->belongsTo(rawatJalan::class);
    // }

    protected $fillable = [
        'nama',
        'nohp',
        'alamat',
        'jam',
        'id_category',
        'id_service',
        'id_doctor',
        'id_tarif',
        'tanggal',
        'keluhan',
        'status',
        'user_id',
        'komfirmasi',
    ];

}
