<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $fillable = [
        'title','review', 'stars', 'user_id','move_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Movie()
    {
        return $this->belongsTo('App\Movie');
    }

}
