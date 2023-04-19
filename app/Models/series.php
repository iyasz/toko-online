<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class series extends Model
{
    use HasFactory;

    protected $table = 'series';

    protected $fillable = [
        'name',
    ];
}
