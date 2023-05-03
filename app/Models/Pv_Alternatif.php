<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pv_Alternatif extends Model
{
    use HasFactory;

    protected $table = 'pv_alternatif';
    protected $fillable = [
        'id_alternatif',
        'id_kriteria',
        'nilai',
    ];
}
