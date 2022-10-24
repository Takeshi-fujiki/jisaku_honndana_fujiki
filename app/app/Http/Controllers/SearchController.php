<?php

namespace App\Http\Controllers;

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
        // dd($request);
        $search = $request->input('search');

        $query = new Book;

        $books = $query
        ->where('name','LIKE',"%{$search}%")
        ->orWhere('author1','LIKE',"%{$search}%")
        ->orWhere('author2','LIKE',"%{$search}%")
        ->orWhere('author3','LIKE',"%{$search}%")
        ->get();
        $book = $books->where('lending',0)->toArray();

        $week = Carbon::now()->addWeeks(2)->format('Y-m-d');

        return view('search',[
            'books' => $book,
            'week' => $week,
        ]);
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

        return view('rental',[
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
        // $del_flg = Comment::find($id);

        // $del_flg->del_flg = 1;
        // $del_flg->save();

        // return view('return');
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
