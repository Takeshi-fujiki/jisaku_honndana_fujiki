<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Book;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Image;
use Intervention;


class AdminController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id','>',1)->where('role','>=',10)->get();

        return view('admin_AllUsers',[
            'users' => $users,
        ]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     * @return \App\User
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {

        $file = $request->file('image')->store('public/images');
        $file = str_replace('public/images/','',$file);

        Book::create([
            'name' => $request->name,
            'author1' => $request->author1,
            'author2' => $request->author2,
            'author3' => $request->author3,
            'image_path' => $file,
            'date' => Carbon::now(),
            'book_user_id' => 1,
            'type_id' => $request->type_id,
        ]);
        
        return redirect()->route('admin.show',['admin'=>1]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Book::
        select('books.name as book_name','users.name','books.lending','image_path')
        ->join('users','books.book_user_id','users.id')->get();

        return view('admin_books',[
            'books' => $user,
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
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

    public function exceed() {

        $date = Carbon::now()->subweeks(2);
        $dates = Carbon::now()->subMonth();

        $user = Book::
        select('date','users.name')
        ->join('users','books.book_user_id','users.id')
        ->whereDate('date','<=', $date)
        ->get()->toArray();

        $users = Book::
        select('date','users.name')
        ->join('users','books.book_user_id','users.id')
        ->whereDate('date','<=', $dates)
        ->get()->toArray();

        return view('admin_exceed',[
            'users' => $user,
            'dates' => $users,
        ]);
        

    }

    public function UpClose() {
        // $a = 'a';

        $dates = Carbon::now()->addDays(3)->format('Y-m-d');
        $date = Carbon::now()->addDays()->format('Y-m-d');
        
        $users3 = Book::
                 where('lending',1)
               ->where('date' ,'=',$dates)
               ->get()->toArray();

        $users1 = Book::
                 where('lending',1)
               ->where('date' ,'=',$date)
               ->get()->toArray();
        // dd($users1);

        $book_users = Book::select('users.name','books.date','books.image_path')
                    ->join('users','books.book_user_id','users.id')
                    ->where('lending',1)
                    ->where('date' ,$date)
                    ->get()->toArray();

        $book = Book::select('users.name','books.date','books.image_path')
        ->join('users','books.book_user_id','users.id')
        ->where('lending',1)
        ->where('date' ,$dates)
        ->get()->toArray();

    
        
        return view('admin_UpClose',[
         'books' => $book_users,
         'users' => $book,
        ]);
      
            
    }
}
