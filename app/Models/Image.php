<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Napravicemo polimorfnu relaciju 1:1 izmedju modela Image i Post i Image i User 
 * Kada jedan model pravi vise relacija sa drugim tabelama onda se koriste polimorfne relacije
 */
class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    // znaci da ovaj model pravi istovetne relacije sa vise razlicitih modela 
    // i zato koristimo morphTo() => polimorfna relacija (u ovom slucaju 1:1)
    // 1) kada pogledas model Post videces da se on kaci na relaciju imageable()
    // 2) pogledaj model User, desava se ista situacija
    // na kraju krajeva, nema potrebe da imas vise modela sa ovim Image, zapravo svaka relacija moze da
    // ti bude polimorfna, e sada pitanje je da li ce biti
    public function imageable() 
    {
        return $this->morphTo();
    }
}
