<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [];

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
