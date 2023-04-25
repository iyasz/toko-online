<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    protected $table = 'address';

    protected $fillable = [
        'user_id',
        'name',
        'telp',
        'province_id',
        'city_id',
        'is_main',
        'street',
        'zipcode',
    ];
}
