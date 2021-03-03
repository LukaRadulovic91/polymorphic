<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relacija jedan na vise (1:N) sa Post modelom, samo ovde je inverzna
    // ovu relaciju zapravo mozes da koristis za koji god zelis model, ovo znaci samo 
    // da je Model spreman na polimorfizam
    public function commentable()
    {
        return $this->morphTo();
    }
}
