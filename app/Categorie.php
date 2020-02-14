<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $casts = [
        "adult" => "boolean",
    ];

    protected $fillable = [
        'title', 'description'
    ];
}
