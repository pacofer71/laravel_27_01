<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable=['titulo', 'sinopsis', 'pvp', 'stock', 'isbn'];




    //Query scopes
public function scopeTitulo($query, $text){
    return $query->where('titulo', 'like', "%$text%");
}
public function scopeSinopsis($query, $text){
    return $query->where('sinopsis', 'like', "%$text%");
}

public function scopePvp($query, $num){
    switch($num){
        case 1:
            return $query->where('pvp', '<=', 20);
        case 2:
            return $query->where('pvp', '>', 20)->where('pvp', '<=', 50);
        case 3:
            return $query->where('pvp', '>', 50);  
    }
}

}

