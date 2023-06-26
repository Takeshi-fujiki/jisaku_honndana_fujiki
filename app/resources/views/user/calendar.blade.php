@extends('layouts.app')
@section('content')


<div class="d-flex justify-content-center">
    <h6>Ajaxあり</h6>
</div>
<div class="d-flex justify-content-center">
    <div id='calendar'></div>
</div>

<div class="modal fade" id="testModal1" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="date">イベントを追加する</h5>
            </div>

            <form action="" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>イベント名</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="イベント名">
                    </div>
                    <div class="form-group">
                        <label>日付</label>
                        <input type="date" name="start" id="start" class="form-control" placeholder="年/月/日">
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
                    <button id="btn2" class="btn btn-primary">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="detailMod" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="date" class="modal-title"></h5>
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
                        <textarea name="description" name="discription" id="discription" class="form-control"></textarea>
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

<style>
.modal-dialog{
  display: flex;
  align-items: center;
  min-height: 100%;
}

#calendar{
    width: 60%;
}
</style>
@endsection


<script>
//DBからデータ取得
let data = <?php echo $events; ?>;
//全データをカレンダーに表示
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        events:data,
        // initialView:"dayGridMonth",
        dateClick: (e)=>{
            // console.log(e);
            $("#date").html(e.dateStr);
            $("#start").val(e.dateStr);
            $("#testModal1").modal('toggle');
        },
        eventClick: (e,jsEvent,view)=>{
            // console.log(e.event.extendedProps.description);
            let find = $('#detailMod').find('#title');
            find.val(e.event.title);

            let findDescription = $('#detailMod').find('#discription');
            findDescription.val(e.event.extendedProps.description);
            console.log(findDescription.val());

            $("#detailMod").modal('toggle');
        }
    });
    
    //実行
    calendar.render();
});

</script>

