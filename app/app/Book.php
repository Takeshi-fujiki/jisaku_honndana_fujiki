<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name','author1','author2','author3'];

    public function user() {
        return $this->belongsTo('App\User','id','book_user_id');
    }
}
