<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'img',
        'description',
        'brand',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favoritedUsers()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
}
