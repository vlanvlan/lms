<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'invoice',
        'status',
        'grand_total',
        'payment_gateway',
        'snap_url',
        'paid_at',
        'payable_type',
        'payable_id',
    ];
}

