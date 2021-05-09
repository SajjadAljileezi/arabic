<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    protected $fillable = [
        'weight','height','length','width','size','tracking','company','userid',
    ];
}
