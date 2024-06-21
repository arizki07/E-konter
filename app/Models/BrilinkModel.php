<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrilinkModel extends Model
{
    use HasFactory;
    protected $table = 'tb_brilink';
    protected $fillable = [
        'no_rek',
        'harga',
        'admin',
        'bank',
        'status',
    ];
}
