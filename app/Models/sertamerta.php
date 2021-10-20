<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sertamerta extends Model
{
    use HasFactory;

    protected $fillable = [
        'ringkasan',
        'sumber',
        'telp',
        'kategori',
        'link',
        'unduhan'
    ];
}
