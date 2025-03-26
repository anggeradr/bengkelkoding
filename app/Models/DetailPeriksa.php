<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPeriksa extends Model {
    use HasFactory;

    protected $table = 'detail_periksa'; 

    protected $fillable = [
        'id_periksa',
        'id_obat'
    ];

    /**
     * Relasi ke Periksa (DetailPeriksa milik satu Periksa)
     */
    public function periksa(): BelongsTo {
        return $this->belongsTo(Periksa::class, 'id_periksa');
    }

    /**
     * Relasi ke Obat (DetailPeriksa milik satu Obat)
     */
    public function obat(): BelongsTo {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}