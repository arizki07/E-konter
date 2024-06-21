<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelangganModel extends Model
{
    use HasFactory;
    protected $table = 'tb_pelanggan';
    protected $fillable = [
        'nama_pelanggan',
        'alamat',
        'noHp',
    ];
}
