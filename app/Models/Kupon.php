<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kupon extends Model
{
    use HasFactory;

    protected $table = 'kupon';

    // protected $primaryKey = 'kode_kupon';
  
    protected $fillable = [
        'kode_kupon',
        'jumlah',
        'validasi',
        'created_at',
        'updated_at'
    ];

    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setKodeKuponAttribute($kode_kupon)
    {
        //string to lowercase mutator
        $this->attributes['kode_kupon'] = strtolower($kode_kupon);
    }
}
