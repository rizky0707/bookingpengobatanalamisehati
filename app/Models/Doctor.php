<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function bookings()
    {   
        return $this->hasMany(Booking::class);
    }

    public function categoryservice()
    {
        return $this->belongsTo(CategoryService::class, 'id_category');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }

    protected $fillable = [
        'name',
        'id_category',
        'id_service',
        'jam',
        'jam_akhir',
        'nohp',
    ];
}
