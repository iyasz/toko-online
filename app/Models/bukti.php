<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bukti extends Model
{
    use HasFactory;

    protected $table = "bukti_pembayaran";

    protected $fillable = [
        'invoice_code',
        'gambar',
        'status',
    ];
}
