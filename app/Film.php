<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable=['restaurant_id', 'title', 'year', 'director'];

    public function user() {
        return $this->belongsTo('App\User');
    }

}
