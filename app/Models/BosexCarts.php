<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BosexCarts extends Model
{
    protected $fillable = [
        'userid' ,'weight','height','length','width','size'
    ];
    public function measure()
    {
        return $this->hasMany(Measure::class);
    }
}
