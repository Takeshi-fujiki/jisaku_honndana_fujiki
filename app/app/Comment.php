<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $fillable = ['comment','date','user_id','good','del_flg'];

    public function comment() {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function book() {
        return $this->belongsTo('App\Book','id','book_id');
    }


}
