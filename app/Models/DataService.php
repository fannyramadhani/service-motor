<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataService extends Model
{
    protected $fillable = [
        'service_id',
        'keluhan',
        'estimasi_service',
        'nama_mekanik',
        'sparepart_pengganti',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}