<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    public function rawatJalan()
    {
        return $this->belongsToMany(RawatJalanDiagnosa::class, 'rawat_jalan_obat')->withPivot('jumlah');
    }

    protected $fillable = [
        'nama_obat',
        'deskripsi',
        'stok',
        'harga',
    ];

    protected $attributes = [
        'stok' => 0, // Default stok adalah 0
    ];
}
