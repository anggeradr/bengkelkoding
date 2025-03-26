<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Obat extends Model {
    use HasFactory;

    protected $table = 'obat'; // Pastikan Laravel menggunakan nama tabel yang benar

    protected $fillable = [
        'nama_obat',
        'kemasan',
        'harga'
    ];

    public function detailPeriksa(): HasMany {
        return $this->hasMany(DetailPeriksa::class, 'id_obat');
    }
}