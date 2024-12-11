<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomfirmasiPembayaran extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }

    public function booking()
    {
        return $this->belongsTo(booking::class, 'booking_id');
    }

    protected $fillable = [
        'nama_pengirim',
        'nomor_rekening_pengirim',
        'bukti_pembayaran',
        'user_id',
        'status',
    ];
}
