<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $fillable = [
        'name',
        'duration_months',
        'price',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'price'     => 'float',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}

