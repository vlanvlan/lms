<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Course extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'description',
        'image',
        'level',
        'price',
        'discount_price',
        'status',
        'demo',
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'course_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Module::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($image) => asset('storage/course/' . $image),
        );
    }
}
