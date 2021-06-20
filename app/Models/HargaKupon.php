<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaKupon extends Model
{
    use HasFactory;

    protected $table = 'harga_kupon';

    protected $fillable = [
        'harga'
    ];
}
