<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'titulo', 'autor', 'categoria','texto'
    ];
}
