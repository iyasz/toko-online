<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'category_id',
        'series_id',
        'brand_id',
        'character_id',
        'image',
        'name',
        'harga',
        'slug',
        'produser',
        'stok',
        'deskripsi',
    ];


}
