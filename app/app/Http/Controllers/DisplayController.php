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

        $comment = Book::
        select('comments.comment','comments.id','comments.good','image_path')
        ->join('comments','comments.book_id','books.id')
        ->where('comments.user_id',Auth::id())
        ->where('comments.del_flg',0)->get();

 

        return view('user_comment',[
            'comments' => $comment,
        ]);
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


        $book = Book::where('book_user_id',Auth::id())
                    ->where('lending',1)
                    ->get()->toArray();
        $date = Book::select('date')
        ->where('book_user_id',Auth::id())
        ->where('lending',1)
        ->get()->toArray();
    
        return view('mypage',[
            'books' => $book,
            'dates' => $date,
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

        $books = Book::where('book_user_id',Auth::id())
                    ->where('lending',1)
                    ->get()->toArray();

        $date = Book::select('date','name')
        ->where('book_user_id',Auth::id())
        ->where('lending',1)
        ->get()->toArray();

        return view('mypage',[
            'books' => $books,
            'dates' => $date,
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
        $book = Book::where('id',$id)->get()->toArray();

        return view('comment_edit',[
            'id' => $id,
            'comment' => $comment,
            'books' => $book,
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
        $edit_id->good = $request->good;
        $edit_id->user_id = $ID;
        $edit_id->save();

        $comments = Comment::where('user_id',Auth::id())
                            ->where('del_flg',0)
                            ->get()->toArray();

        $book = Book::where('book_user_id',Auth::id())
                ->where('lending',1)
                ->get()->toArray();

        return redirect()->route('display.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disiplay  $display
     * @return \Illuminate\Http\Response
     * @param  int $id
     */
    public function destroy(int $id ,Disiplay $disiplay)
    {
        $del_id = Comment::find($id);

        $del_id->del_flg = 1;
        $del_id->save();

        $comments = Comment::where('user_id',Auth::id())
                            ->where('del_flg',0)
                            ->get()->toArray();

        $book = Book::where('book_user_id',Auth::id())
                ->where('lending',1)
                ->get()->toArray();

        return redirect()->route('display.index');
    }


    public function create_comment(int $id) {
        
        $book = Book::where('id',$id)->get();
        return view('comment_create',[
            'books' => $book,
        ]);
    }

    public function comment_show(int $id,Request $request) {
        
        $comment = new Comment;
        $book = Book::find($id);
        $ID = Auth::id();

        $comment->comment = $request->comment;
        $comment->date = $request->date;
        $comment->good = $request->good;
        $comment->user_id = $ID;
        $comment->book_id = $id;
        $comment->save();
    

        $book = Book::where('id',$id)
                ->get()->toArray();

        $comment = Comment::
        select('comment','good','users.name')
        ->join('users','comments.user_id','users.id')
        ->where('book_id',$id)
        ->where('del_flg',0)->get();

        return view('books_detail',[
            'comments' => $comment,
            'books' => $book,
        ]);
        
    }


    public function comment() {
        $book = Book::where('book_user_id',Auth::id())
                ->get()->toArray();

        $comements = Comment::where('user_id',Auth::id())
                            ->where('del_flg',0)
                            ->get()->toArray();

        return view('user_comment',[
            'comments' => $comments,
            'books' => $books,
        ]);
    }


    public function books_detail(int $id) {


        $book = Book::where('id',$id)
                    ->get()->toArray();

        $comment = Comment::
        select('comment','good','users.name')
        ->join('users','comments.user_id','users.id')
        ->where('book_id',$id)
        ->where('del_flg',0)->get();

    
            return view('books_detail',[
                'comments' => $comment,
                'books' => $book,
               
            ]);
    }


}
