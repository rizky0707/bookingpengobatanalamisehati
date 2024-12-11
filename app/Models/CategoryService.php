<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryService extends Model
{
    use HasFactory;

    public function doctors()
    {   
        return $this->hasMany(Doctor::class);
    }

    public function bookings()
    {   
        return $this->hasMany(Doctor::class);
    }

    public function services()
    {   
        return $this->hasMany(Service::class);
    }

    protected $fillable = [
        'name',
    ];
}
