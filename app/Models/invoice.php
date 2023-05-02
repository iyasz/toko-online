<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;

    protected $table = "invoice";

    protected $fillable = [
        'user_id',
        'weight',
        'destination_id',
        'courier_id',
        'layanan',
        'total_price',
        'payment_status',
        'note',
        'address_id',
        'order_status',
        'invoice_code',
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }
    
}
