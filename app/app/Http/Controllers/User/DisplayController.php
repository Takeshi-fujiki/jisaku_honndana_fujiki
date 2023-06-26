<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Disiplay;
use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Book;
use App\Like;
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
        select('comments.comment','comments.id','comments.good','image_path','comments.date')
        ->join('comments','comments.book_id','books.id')
        ->where('comments.user_id',Auth::id())
        ->where('comments.del_flg',0)->get();


        return view('user.user_comment',[
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
        return view('user.comment_create');
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
    
        return view('user.mypage',[
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
                    ->get();

        $date = Book::select('date','name')
        ->where('book_user_id',Auth::id())
        ->where('lending',1)
        ->get();
        
        // ユーザの投稿の一覧を作成日時の降順で取得
        //withCount('テーブル名')とすることで、リレーションの数も取得できます。
        // $posts = Book::withCount('likes')->orderBy('created_at', 'desc')->paginate(10);
        $like_model = new Like;
        foreach($books as $book){
            $reviews = Book::withCount('likes')->where('id', $book->id)->get();
        }
        // dd($reviews);

        
        return view('user.mypage',[
            'books' => $books,
            'dates' => $date,
            'like_model'=>$like_model,
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

        return view('user.comment_edit',[
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

        // $comments = Comment::where('user_id',Auth::id())
        //                     ->where('del_flg',0)
        //                     ->get()->toArray();

        // $book = Book::where('book_user_id',Auth::id())
        //         ->where('lending',1)
        //         ->get()->toArray();

        return redirect()->route('user.display.index');
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

        return redirect()->route('user.display.index');
    }


    public function create_comment(int $id) {
        dd($id);
        $book = Book::where('id',$id)->get();
        return view('user.comment_create',[
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

        // $request->session()->put('all',$request);
        // dd($request->session()->get('good'));
    

        $book = Book::where('id',$id)
                ->get()->toArray();

        $comment = Comment::
        select('comment','good','users.name')
        ->join('users','comments.user_id','users.id')
        ->where('book_id',$id)
        ->where('del_flg',0)->get();

        $like_model = new Like;

        return view('user.books_detail',[
            'comments' => $comment,
            'books' => $book,
            'like_model'=>$like_model,
        ]);
        
    }


    public function comment() {
        $books = Book::where('book_user_id',Auth::id())
                ->get()->toArray();

        $comments = Comment::where('user_id',Auth::id())
                            ->where('del_flg',0)
                            ->get()->toArray();

        return view('user.user_comment',[
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

        // $session = session()->get('all');
    
        // dd($session);
        $like_model = new Like;

        // dd($sesion);
        
            return view('user.books_detail',[
                'comments' => $comment,
                'books' => $book,
                'like_model'=>$like_model,
            ]);
    }

    public function ajaxlike(Request $request)
    {
        $user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $book_id = $request->book_id; //2.投稿idの取得
        $already_liked = Like::where('user_id', $user_id)->where('book_id', $book_id)->first(); //3.
    
        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $like = new Like; //4.Likeクラスのインスタンスを作成
            $like->book_id = $book_id; //Likeインスタンスにbook_id,user_idをセット
            $like->user_id = $user_id;
            $like->save();

            $already_liked = Like::where('user_id', $user_id)->where('book_id', $book_id)->get(); //3.
            return response()->json($already_liked); //6.JSONデータをjQueryに返す

        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Like::where('book_id', $book_id)->where('user_id', $user_id)->delete();
            $already_liked = Like::where('user_id', $user_id)->where('book_id', $book_id)->get(); //3.
            return response()->json($already_liked); //6.JSONデータをjQueryに返す
        }
  
    }

    public function likes_list(){
        $likes = Like::where('user_id', Auth::id())->get();
        $like_model = new Like;
        return view('user.likes_list',[
            'likes' => $likes,
            'like_model'=>$like_model,
        ]);
    }

}
