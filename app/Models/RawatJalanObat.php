<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatJalanObat extends Model
{
    use HasFactory;
    protected $table = 'rawat_jalan_obat';

    protected $fillable = [
        'rawat_jalan_diagnosa_id',
        'obat_id',
        'jumlah',
    ];

    public function diagnosa()
    {
        return $this->belongsTo(RawatJalanDiagnosa::class, 'rawat_jalan_diagnosa_id', 'id');
    }

    // Relasi ke RawatJalanDiagnosa
    public function rawatJalanDiagnosa()
    {
        return $this->belongsTo(RawatJalanDiagnosa::class, 'rawat_jalan_diagnosa_id', 'id');
    }

    // Relasi ke tabel Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id', 'id');
    }
}
