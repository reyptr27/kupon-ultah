<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'kode_kupon',
        'nama',
        'hp',
        'jumlah',
        'total',
        'validasi',
        'created_at',
        'updated_at'
    ];
}
