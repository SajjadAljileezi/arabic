<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'tracking' ,'company' , 'userid' ,'weight','height','length','width','size'
    ];
}
