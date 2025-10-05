<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'image',
        'title',
        'slug',
        'content',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format('d-M-Y'),
        );
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url('/storage/posts/' . $value),
        );
    }
}

