<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    use HasFactory;

    protected $guardedd = ['id'];

    // protected $fillable = [
    //     'id_panwas',
    //     'tanggal',
    //     // Tambahkan atribut lain yang diizinkan untuk penugasan massal
    // ];

    protected $fillable = ['nama_panwas', 'tanggal'];
    
    public function panwas(){
        return $this->hasOne(panwas::class,'no','id_panwas');
    }
}
