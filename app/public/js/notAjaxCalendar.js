$(function () {
    $('.alert-success').fadeOut(3000);
    
    $('#bt3').click(function () {
        let title = $("#title").val();
        let description = $("#description").val();
        let start = $("#date").html();
        let color = $("#color").val();

        $('#testMod3').modal('toggle');
        var calendarEl = document.getElementById('calendar');
        let events = [
                    {
                        title:title,
                        description:description,
                        start:start,
                        color:color,
                    },
                ];
        var calendar = new FullCalendar.Calendar(calendarEl, {
            events: events,
            dateClick: (e)=>{
                // console.log(e);
                $("#date").html(e.dateStr);
                $("#start").val(e.dateStr);
                $("#testMod3").modal('toggle');
            },
            eventClick: (e)=>{
                // console.log(e.event.extendedProps.description);
                let find = $('#detailMod').find('#title');
                find.val(e.event.title);
    
                let findDescription = $('#detailMod').find('#description');
                findDescription.val(e.event.extendedProps.description);
                // console.log(findDescription.val());
    
                $("#detailMod").modal('toggle');
            }
            // initialView:"dayGridMonth",
        });
            //実行
            calendar.render();
    });

})