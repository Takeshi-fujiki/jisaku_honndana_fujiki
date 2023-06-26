<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Like extends Model
{
    protected $fillable = ['user_id','book_id'];

    public function user() {
        return $this->belongsTo('App\User','id','user_id');
    }

    public function book() {
        return $this->belongsTo('App\User','id','book_id');
    }

    public function books() {
        return $this->belongsTo('App\book','book_id','id');
    }

    public function isLikedBy($user_id, $book_id){
        return Like::where('user_id', $user_id)->where('book_id', $book_id)->exists();
    }
}
