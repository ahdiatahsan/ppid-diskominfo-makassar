<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setiapsaat extends Model
{
    use HasFactory;

    protected $fillable = [
        'ringkasan',
        'penanggungjawab',
        'telp',
        'unduhan'
    ];
}
