<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;

class ApiTestController extends Controller
{
    public function test(Request $request)
    {
        $eve = Event::where('title',$request->title2)->first();
        $summary = $eve->title;
        $start = $eve->start;
        $end = $eve->start;
        // dd($start);

        $client = $this->getClient();
        $service = new Google_Service_Calendar($client);

        $calendarId = env('GOOGLE_CALENDAR_ID');

        $event = new Google_Service_Calendar_Event(array(
            //タイトル
            'summary' => $summary,
            'start' => array(
                // 開始日時
                'dateTime' => $start.'T11:00:00+09:00',
                'timeZone' => 'Asia/Tokyo',
            ),
            'end' => array(
                // 終了日時
                'dateTime' => $end.'T12:00:00+09:00',
                'timeZone' => 'Asia/Tokyo',
            ),
        ));

        $event = $service->events->insert($calendarId, $event);
        $event2 = Event::select('title','start','color','description')->get();

        return redirect()->route('user.notAjax_calendar')->with('successMessage', 'Googleカレンダーへの登録が完了しました。');
        // return view('not_ajax_calendar',[
        //     'events'=>$event2,
        // ])->with('successMessage', 'Googleカレンダーへの登録が完了しました。');
    }

    private function getClient()
    {
        $client = new Google_Client();

        //アプリケーション名
        $client->setApplicationName('API_test');
        //権限の指定
        $client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS);
        //JSONファイルの指定
        $client->setAuthConfig(storage_path('app/api-key/numeric-lead-376409-b482894dce87.json'));

        return $client;
        // echo 'aaa';
    }
}
?>