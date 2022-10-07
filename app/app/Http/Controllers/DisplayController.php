<?php

namespace App\Http\Controllers;

use App\Disiplay;
use Illuminate\Http\Request;
use App\Comment;
use App\User;
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
       
        // return Comment::create([
        //     'comment' => $request['comment'],
        // ]);
        
        $comment = new Comment;
        $id = Auth::id();

        $comment->comment = $request->comment;
        $comment->date = $request->date;
        $comment->user_id = $id;
        $comment->save();

        $com = new Comment;
        $comment = $com->where('user_id',Auth::id())->get()->toArray();
    
        return view('mypage',[
            'comments' => $comment,
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
        $com = new Comment;
        $comment = $com->where('user_id',Auth::id())->get()->toArray();
        // $comment = Auth::user()->comment()->get();
    
        return view('mypage',[
            'comments' => $comment,
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
        // dd($id);

        return view('comment_edit',[
            'id' => $id,
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
        // dd($request);
        $comment = new Comment;
        $ID = Auth::id();
        $edit_id = $comment->find($id);

        $edit_id->comment = $request->comment;
        $edit_id->date = $request->date;
        $edit_id->user_id = $ID;
        $edit_id->save();

        return view('mypage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disiplay  $disiplay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disiplay $disiplay)
    {
        //
    }
}
