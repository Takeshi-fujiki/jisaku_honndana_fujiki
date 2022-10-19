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

        $books = $query->where('name','LIKE',"%{$search}%")
        ->orWhere('author1','LIKE',"%{$search}%")
        ->orWhere('author2','LIKE',"%{$search}%")
        ->orWhere('author3','LIKE',"%{$search}%")->get()->toArray();

        return view('search',[
            'books' => $books,
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
            'book' => $rent,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rent = Book::find($id);
        $ID = Auth::id();

        // 同じリンクから来てる↓　lending=1(貸し出し中の本)でも借りられてしまう

        if($rent['lending'] === 0) {
            $week = Carbon::now()->addWeeks(2)->format('Y年m月d日');

            $rent->lending = 1;
            $rent->book_user_id = $ID;
            $rent->date = $week;
            $rent->save();

            return view('rental_complete',[
                'book' => $rent,
                'week' => $week,
            ]);

        }else if($rent['lending'] === 1) {

            $rent->lending = 0;
            $rent->book_user_id = 1;
            $rent->save();

            return view('rental_complete',[
                'book' => $rent,
            ]);
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
