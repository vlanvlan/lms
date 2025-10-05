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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function payable(): MorphTo
    {
        return $this->morphTo();
    }
}

