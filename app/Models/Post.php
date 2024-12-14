<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posty";
    // Tylko poniższe pola mogą być przypisane masowo - przy pomocy metody create() lub update() nie save() !
    protected $fillable = ['tytul','user_id','tresc'];
    // Definicja relacji do modelu User
    public function user()
    {
        return $this->belongsTo(User::class);
        // można też dodać klucz obcy, ale skoro jest on w formie '{model}_id' to można to pominąć
        // return $this->belongsTo(User::class,'user_id');
    }
}
