$(function () {

    $("#btn2").click(function (event) {
        console.log(122345);
        $('#testModal1').modal('toggle');
        event.preventDefault();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let title = $("#title").val();
        let start = $("#start").val();
        let description = $("#description").val();
        let color = $("#color").val();
        
        $.ajax({
        dataType:"json",
        url: '/user/event', //通信先アドレスで、このURLをあとでルートで設定します
        method: 'POST', //HTTPメソッドの種別を指定します。1.9.0以前の場合はtype:を使用。
        data: { //サーバーに送信するデータ
            'title': title,
            'start': start,
            'description':description,
            'color': color,
        }
        //通信が成功したとき
    })
    .done(function (data) {
        console.log(data);
        //入力した値を用意
            //FullCalendarに反映
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                events: data,
                dateClick: (e)=>{
                    // console.log(e);
                    $("#date").html(e.dateStr);
                    $("#start").val(e.dateStr);
                    $("#testModal1").modal('toggle');
                },
                eventClick: (e)=>{
                    console.log(123);
                    // console.log(e.event.extendedProps.description);
                    let find = $('#detailMod').find('#title');
                    find.val(e.event.title);
        
                    let findDescription = $('#detailMod').find('#discription');
                    findDescription.val(e.event.extendedProps.description);
                    // console.log(findDescription.val());
        
                    $("#detailMod").modal('toggle');
                }
            });
            //登録
            calendar.render();
            
        })
        //通信が失敗したとき
        .fail(function () {
            console.log('fail');
        });
    });
});