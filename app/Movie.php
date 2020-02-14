<?php

namespace App;
// important la comande per crear el nostre model Movie  php artisan make:model Movie
// php artisan migrate cargar la condiguració
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $casts = [
        "rented" => "boolean",
    ];

    protected $fillable = [
        'title', 'year', 'director', 'poster', 'synopsis', 'rented', 'video', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Categorie');
    }
}
