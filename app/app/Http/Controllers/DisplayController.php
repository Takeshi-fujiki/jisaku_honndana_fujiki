<?php

namespace App\Http\Controllers;

use App\Disiplay;
use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Book;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comment_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $comment = new Comment;
        $id = Auth::id();

        $comment->comment = $request->comment;
        $comment->date = $request->date;
        $comment->good = $request->good;
        $comment->user_id = $id;
        $comment->save();

        $comments = $comment->where('user_id',Auth::id())->get()->toArray();

        $book = Book::where('book_user_id',Auth::id())
                    ->where('lending',1)
                    ->get()->toArray();
    
        return view('mypage',[
            'comments' => $comments,
            'books' => $book,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // $rent = Book::find(Auth::id());
        $comment = Comment::where('user_id',Auth::id())->get()->toArray();
        $book = Book::where('book_user_id',Auth::id())
                    ->where('lending',1)
                    ->get()->toArray();

        return view('mypage',[
            'comments' => $comment,
            'books' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Disiplay  $disiplay
     * @return \Illuminate\Http\Response
     * @param  int $id
     */
    public function edit(int $id)
    {

        $comment = Comment::find($id);

        return view('comment_edit',[
            'id' => $id,
            'comment' => $comment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disiplay  $disiplay
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id,Request $request,Disiplay $disiplay)
    {
        $ID = Auth::id();
        $edit_id = Comment::find($id);

        $edit_id->comment = $request->comment;
        $edit_id->date = $request->date;
        $edit_id->user_id = $ID;
        $edit_id->save();

        $comments = Comment::where('user_id',Auth::id())
                            ->where('del_flg',0)
                            ->get()->toArray();

        $book = Book::where('book_user_id',Auth::id())
                ->where('lending',1)
                ->get()->toArray();

        return view('mypage',[
            'comments' => $comments,
            'books' => $book,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Display  $display
     * @return \Illuminate\Http\Response
     * @param  int $id
     */
    public function destroy(int $id ,Display $display)
    {
        // 
    }
}
