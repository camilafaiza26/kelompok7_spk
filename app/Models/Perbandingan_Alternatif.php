<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perbandingan_Alternatif extends Model
{
    use HasFactory;

    protected $table = 'perbandingan_alternatif';
    
    protected $fillable = [
        'alternatif1',
        'alternatif2',
        'pembanding',
        'nilai'
    ];
}
