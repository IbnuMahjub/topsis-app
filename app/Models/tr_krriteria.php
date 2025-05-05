<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tr_krriteria extends Model
{
    use HasFactory;
    protected $table = 'tr_krriterias';

    protected $fillable = [
        'kriteria',
        'bobot',
        'tipe',
    ];
}
