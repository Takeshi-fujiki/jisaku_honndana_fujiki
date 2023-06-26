<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Book::query();
        
        // 全角スペースを半角に変換
        $spaceConversion = mb_convert_kana($search, 's');
        
        // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
        $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

        // 単語をループで回し、部分一致するものがあれば、$queryとして保持される
        foreach($wordArraySearched as $value) {
                // $query->orWhere('name','LIKE',"%{$value}%")
                // ->orWhere('author1','LIKE',"%{$value}%")
                // ->orWhere('author2','LIKE',"%{$value}%")
                // ->orWhere('author3','LIKE',"%{$value}%");

                $query->orWhere(function($query) use($value){
                    $query->where('lending',0)->where('name','LIKE',"%{$value}%")
                    ->orWhere('author1','LIKE',"%{$value}%")
                    ->orWhere('author2','LIKE',"%{$value}%")
                    ->orWhere('author3','LIKE',"%{$value}%");
                });
        }

        $books = $query->get();
        // dd($books);
        $week = Carbon::now()->addWeeks(2)->format('Y-m-d');


        return view('user.search',[
            'books' => $books,
            'week' => $week,
        ]);
        
        // $books = $query
        // ->where('name','LIKE',"%{$vsearch}%")
        // ->orWhere('author1','LIKE',"%{$search}%")
        // ->orWhere('author2','LIKE',"%{$search}%")
        // ->orWhere('author3','LIKE',"%{$search}%")
        // ->get();
        // $book = $books->where('lending',0)->toArray();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rent = Book::find($id);

        return view('user.rental',[
            'books' => $rent,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function edit($id,Request  $request)
    {
        // $book = new Book;

        // $book->lending = 0;
        // $book->book_user_id = 1;
        // $book->date = Null;
        // $book->save();

        // return response()->json('Ok');


        $rent = Book::find($id);
        $ID = Auth::id();

            if($rent['lending'] === 0) {
                $week = Carbon::now()->addWeeks(2)->format('Y-m-d');

                $rent->lending = 1;
                $rent->book_user_id = $ID;
                $rent->date = $week;
                $rent->save();

                return response()->json('Ok');

            }else if($rent['lending'] === 1) {


                $rent->lending = 0;
                $rent->book_user_id = 1;
                $rent->date = Null;
                $rent->save();

                return response()->json('Ok');
            }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
