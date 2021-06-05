<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piloco extends Model
{
    use HasFactory;

    protected $fillable = [
        'mode',
        'name',
        'verre',
    ];
}
