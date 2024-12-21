<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'tagline',
        'favicon',
        'wa',
        'link',
        'nama_bank',
        'nama_rek',
        'no_rek',
    ];

}
