// $(function() {
//     get_data();
// });

// 送信ボタンを押した時
$("#click_btn").on("click", function(event){
    event.preventDefault();
    // get_data();
    send_data();
    
});

// suer_chatsのデータ

function get_data() {
    $.ajax({
        url: "/result/ajax/",
        dataType: "json",
        success: data => {
            console.log(data.comments);
            for (var i = 0; i < data.comments.length; i++) {
                console.log(data.comments[i].name);
                console.log(data.comments[i].message);
            }
        },
        error: () => {
            alert("ajax Error");
        }
    });
 setTimeout("get_data()", 5000);
}
function send_data() {
    let element = document.getElementById('to_id');   
    let to_id = element.dataset.toid;
    $.ajax({
        url: "/userchat",
        method: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'message':"固定値テスト",
            'to_id':to_id,
        },
        success: data => {
            console.log(data);
        },
        error: (e) => {
            alert("ajax Error");
            console.log(e);
        }
    })
}