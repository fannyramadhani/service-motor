<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'service_id',
        'jumlah_biaya',
        'jenis_pembayaran',
        'keterangan',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}