<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransPulsaModel extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi';
    protected $fillable = [
        'id_pelanggan',
        'id_harga',
        'tanggal',
        'status'
    ];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(PelangganModel::class, 'id_pelanggan');
    }

    public function harga(): BelongsTo
    {
        return $this->belongsTo(KartuModel::class, 'id_harga');
    }
}
