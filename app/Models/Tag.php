<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    // ovo je N:N relacija izmedju Taga i Posta
    // razlikuje se od prethodnih
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }
    
    // ovde pravis novu relaciju i to N:N sa Video modelom
    // moras je nazvati ovako a ne taggable i da ima metodu MorphTo()
    public function videos()
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
