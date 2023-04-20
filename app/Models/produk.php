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

 
    public function series()
    {
        return $this->belongsTo(series::class);
    }
    
    public function brand()
    {
        return $this->belongsTo(brand::class);
    }
    
    public function character()
    {
        return $this->belongsTo(character::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
