<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    
    protected $fillable = [
        'invoice_id',
        'barang_id',
        'user_id',
        'price',
        'qty',
    ];

    public function invoice()
    {
        return $this->belongsTo(invoice::class);
    }

    public function produk()
    {
        return $this->belongsTo(produk::class, 'barang_id', 'id');
    }
}
