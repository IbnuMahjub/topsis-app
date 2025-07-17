<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopsisResult extends Model
{
    use HasFactory;
    protected $fillable = ['nama_terbaik', 'nilai_preferensi', 'log_perhitungan', 'status'];
}
