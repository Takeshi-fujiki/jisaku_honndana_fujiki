@extends('layouts.app')
@section('content')


<div class="d-flex justify-content-center">
    <h6>Ajaxなし</h6>
</div>

<div class="d-flex justify-content-center">
<!-- フラッシュメッセージ  -->
@if(session('successMessage') == null)
<br>
<br>
@else
    <div class="alert alert-success text-center">
        {{ session('successMessage') }}
    </div> 
<br>
<br>
<br>
@endif
<!-- フラッシュメッセージ終わり -->
</div>

<div class="d-flex justify-content-center">
    <div id='calendar'></div>
</div>

<div class="modal fade" id="testMod3" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="date" name="start" class="modal-title"></h5>
            </div>

            <form action="{{ route('user.notAjax_calendar') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>イベント名</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="イベント名">
                    </div>
                    <div class="form-group">
                        <label>日付</label>
                        <input type="date" name="start" id="start" class="form-control" placeholder="年/月/日" value="2023-01-01">
                    </div>
                    <div class="form-group">
                        <label>備考欄</label>
                        <textarea name="description" name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>カラー</label><br>
                        <input type="color" name="color" id="color" class="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                    <button id="bt3" class="btn btn-primary">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="detailMod" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="date2" class="modal-title"></h5>
            </div>

            <form action="{{ route('user.google_api') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>イベント名</label>
                        <input type="text" name="title2" id="title" class="form-control" placeholder="イベント名" value="a">
                    </div>

                    <div class="form-group">
                        <label>備考欄</label>
                        <textarea name="description" name="discription2" id="description" class="form-control">a</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                    <button id="bt2" class="btn btn-primary">Googleカレンダーに登録</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let events = <?php echo $events; ?>;
    console.log(events);
    //全データをカレンダーに表示
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            events: events,
            dateClick: (e)=>{
                console.log(8888);
                $("#date").html(e.dateStr);
                $("#start").val(e.dateStr);
                $("#testMod3").modal('toggle');
            },
            eventClick: (e,jsEvent,view)=>{
                // console.log(e.event.extendedProps.description);
                let find = $('#detailMod').find('#title');
                find.val(e.event.title);
                // console.log(e.event.start);
                
                let findDescription = $('#detailMod').find('#description');
                findDescription.val(e.event.extendedProps.description);
                // console.log(findDate.val(e.event.start));
                
                $("#detailMod").modal('toggle');
            }
        });
        //実行
        calendar.render();
        // return false;
    });
    
</script>

<style>
.modal-dialog{
  display: flex;
  align-items: center;
  min-height: 100%;
}

#calendar{
    width: 60%;
}

.alert{
    width: 40%;
}
</style>
@endsection