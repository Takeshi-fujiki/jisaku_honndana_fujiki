$(function() {

    // マイページの本棚から本を返す時
    $(".mybooks").on("click",function(event){

        event.preventDefault();
        let book = $(this);
        let modal = book.find('.modal-window');
   
        $(modal).fadeIn();  
        $(".overlay").fadeIn();

        let back = book.find('#back');
        $(back).on("click",function(event) {
            event.preventDefault();
            $(".overlay,.modal-window").fadeOut(); 
            return false;
        })

        let Return = book.find('#return');
        $(Return).on('click',function(event) {
            event.preventDefault();
            get_data();
        })


        

        function get_data() {
        
            // let name = document.querySelector().dataset.book;
            // let num = name.find('return');
            // let data = document.getElementById(".mybooks");
            // let id = data.dataset.book;
            // console.log(id);
            $.ajax({
                url:"/search/"+id+"/edit",
                type:"GET",
                dataType:"json",
                data:{
                    "lending" : 0,
                    "book_user_id" : 1,
                    "date" : null,
                },
                success:function() {
                    let rtn = book.find('.modal-window2');
                    $(rtn).fadeIn();
                    $('.overlay').fadeIn();
    
                    let top = book.find('.modal-window2');
                    $(top).click(function(event) {
                        event.preventDefault();
                        $(rtn).fadeOut();
                        $('.overlay').fadeOut();
                    })
                    console.log("成功");
                },
                error:function() {
                    console.log("通信失敗");
                },
            })
        };

    });
    
    // $("#return").on("click",function(event) {
    //     event.preventDefault();
    //     $('.modal-window').fadeOut();
    //     let rtn = book.find('.modal-window2');
    //     $(".overlay").fadaIn();
    //     $(rtn).fadaIn();
    //     // return false;
    //     get_data();
    // })

    
    // // 本の検索画面から本を借りる時
    // $("#modal-rental").on("click",function(event){
    //     event.preventDefault();
    //     $(".overlay,.modal-rental").fadeIn();

    //     $("#back").on("click",function(event) {
    //         event.preventDefault();
    //         $(".overlay,.modal-rental").fadeOut(); 
    //     }) 
    // });

    // $("#rental").on("click",function(event) {
    //     event.preventDefault();
    //     get_data2();
    // })

    // $(".overlay").on("click",function(){
    //     $(".overlay,.modal-window,.modal-rental").fadeOut();
    // });
    
    
    

    // function get_data2() {
        
    //     let data = document.getElementById('rental');
    //     let id = data.dataset.id;
    //     console.log(id);
    //     $.ajax({
    //         url:"/search/"+id+"/edit",
    //         type:"GET",
    //         dataType:"json",
    //         data:{
    //             "lending" : 1,
    //             "book_user_id" : 14,
    //             "date" : 2022-11-14,
    //         },
    //         success:function() {
    //             $(".overlay,.modal-rental2").fadeIn();
    //             $("#top").click(function(event) {
    //                 event.preventDefault();
    //                 $(".overlay,.modal-rental2").fadeOut();
    //                 docment.location.href = "route('/')"
    //             })
    //             console.log("成功");
    //         },
    //         error:function() {
    //             console.log("通信失敗");
    //         },
    //     });


    // };




    // function send_data() {

    // }
    
    
});