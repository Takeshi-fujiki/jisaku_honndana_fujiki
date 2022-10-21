<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class DeleteController extends Controller
{
    public function delete(int $id) {
        // $comments = Comment::where('user_id',Auth::id())
        //                     ->where('del_flg',0)
        //                     ->get()->toArray();

        $comments = Comment::find($id);
        return view('comment_del',[
            'comments' => $comments, 
        ]);
    }
}
