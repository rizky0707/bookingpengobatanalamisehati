<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    public function rawatJalan()
    {
        return $this->belongsToMany(RawatJalan::class, 'rawat_jalan_obat')->withPivot('jumlah');
    }

    protected $fillable = [
        'nama_obat',
        'jumlah',
        'expired',
    ];
}
