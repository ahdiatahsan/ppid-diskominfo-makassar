<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berkala extends Model
{
    use HasFactory;

    protected $fillable = [
        'ringkasan',
        'unit',
        'penanggungjawab',
        'jangka',
        'unduhan'
    ];
}
