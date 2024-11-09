<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posty";
    // Tylko poniższe pola mogą być przypisane masowo - przy pomocy metody create() lub update() nie save() !
    protected $fillable = ['tytul','autor','email','tresc'];

}
