<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pv_Kriteria extends Model
{
    use HasFactory;

    protected $table = 'pv_kriteria';
    protected $id = 'id_kriteria';
    
    protected $fillable = [
        'id_kriteria',
        'nilai',
    ];
}
