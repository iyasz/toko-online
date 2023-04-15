<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;

    protected $table = "invoice";

    protected $fillable = [
        'name',
        'alamat',
        'user_id',
        'total_price',
        'zipcode',
        'status',
        'invoice_code',
        'telp',
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}