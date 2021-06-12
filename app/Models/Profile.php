<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name' ,'email' , 'phone' ,'userid','address','city','country','card_type','name_card','card_number',
        'card_city','card_address','card_country','card_zip'
    ];
}
