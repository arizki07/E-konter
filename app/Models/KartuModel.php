<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuModel extends Model
{
    use HasFactory;
    protected $table = 'tb_harga';
    protected $fillable = [
        'kartu_perdana',
        'harga',
    ];
}
