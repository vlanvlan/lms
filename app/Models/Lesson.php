<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'module_id',
        'title',
        'type',
        'content',
        'video_url',
        'is_free',
        'order',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    protected $casts = [
        'is_free' => 'boolean',
    ];
}

