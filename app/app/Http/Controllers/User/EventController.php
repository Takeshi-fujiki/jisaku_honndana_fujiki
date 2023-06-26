<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Book;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(Request $request) {

        $event = Event::select('title','start','color','description')->get();
        // $json = json_encode($event);
        // dd($event);
        return view('user.calendar',[
            'events'=>$event,
        ]);
    }

    public function store(Request $request)
    {
        $event = new Event;

        $event->title = $request->title;
        $event->start = $request->start;
        $event->description = $request->description;
        $event->color = $request->color;
        $event->save();

        $data = Event::select('title','start','color','description')->get();
        return response()->json($data);
    }


    // ---NotAjaxここから---

    public function notAjax() {
        $event = Event::select('title','start','color','description')->get();
        $book = Book::where('book_user_id',Auth::id())->where('lending',1)->get();
        // dd($event);
        // $echo1=null;
        // $echo2=null;
        // foreach($event as $e){
        //     if($e->start == '2023-03-15'){
        //         $echo1[] = $event;
        //     }else{
        //         $echo2[] = $event;
        //     }
        // }
        return view('user.not_ajax_calendar',[
            'events'=>$event,
            'books'=>$book,
        ]);
    }

    public function notAjaxPost(Request $request) {
        // dd($request->start);
        $event = new Event;

        $event->title = $request->title;
        $event->start = $request->start;
        $event->color = $request->color;
        $event->description = $request->description;
        $event->save();

        $events = Event::select('title','start','color','description')->get();
        // dd($events);
        return view('user.not_ajax_calendar',[
            'events' => $events,
        ]);
    }
}
