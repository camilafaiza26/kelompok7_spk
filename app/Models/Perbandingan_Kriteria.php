<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perbandingan_Kriteria extends Model
{
    use HasFactory;

    protected $table = 'perbandingan_kriteria';
    
    protected $fillable = [
        'id',
        'kriteria1',
        'kriteria2',
        'nilai'
    ];
}
