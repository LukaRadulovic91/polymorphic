<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    //relacija 1:1 sa Image Modelom
    public function image() 
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    //relacija 1:N sa Comment Modelom
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    //relacija N:N sa Tag Modelom
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
