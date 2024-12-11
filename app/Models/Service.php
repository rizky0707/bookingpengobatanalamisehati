<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    public function bookings()
    {   
        return $this->hasMany(Booking::class);
    }

    public function doctors()
    {   
        return $this->hasMany(Doctor::class);
    }
    

    public function category()
    {
        return $this->belongsTo(CategoryService::class, 'id_category');
    }

    protected $fillable = [
        'id_category',
        'pelayanan',
    ];
}
