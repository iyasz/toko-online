<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $fillable = [
        'user_id',
        'barang_id',
        'qty',
    ];

    public function produk()
    {
        return $this->belongsTo(produk::class, 'barang_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}
