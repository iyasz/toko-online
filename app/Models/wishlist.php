<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlist';

    protected $fillable = [
        'user_id',
        'barang_id',
    ];
}
