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
        
            let name = book.find('#return');
            // let data = document.getElementById(name);
            let id = name[0].dataset.return;
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
                success:function(e) {
                    let rtn = book.find('.modal-window2');
                    $(rtn).fadeIn();
                    $('.overlay').fadeIn();

                    let comment = book.find('#comment');
                    let url ="/create_comment/"+id;
                    // console.log(url);
                    $(comment).on('click',function() {
                        location.replace(url);
                    })

                    console.log("成功");
                },
                error:function() {
                    console.log("通信失敗");
                },
            })
        };

    });
       

    
    // // 本の検索画面から本を借りる時

    // $(".rtl").on("click",function(event){

    //     event.preventDefault();
    //     let book = $(this).parent('.rental');
    //     let modal = book.find('.modal-rental');
   
    //     $(modal).fadeIn();  
    //     $(".overlay").fadeIn();

    //     let back = book.find('#back');
    //     $(back).on("click",function(event) {
    //         event.preventDefault();
    //         $(".overlay,.modal-rental").fadeOut(); 
    //         return false;
    //     })

    //     let rental = book.find('#rental');
    //     $(rental).on('click',function(event) {
    //         event.preventDefault();
    //         get_data2();
    //     })


    //     function get_data2() {
        
    //         let name = book.find('#rental');
    //         // let data = document.getElementById(name);
    //         let id = name[0].dataset.rental;
    //         // console.log(id);
    //         $.ajax({
    //             url:"/search/"+id+"/edit",
    //             type:"GET",
    //             dataType:"json",
    //             data:{
    //                 "lending" : 0,
    //             },
    //             success:function(e) {
    //                 let rtl = book.find('.modal-rental2');
    //                 $(rtl).fadeIn();
    //                 $('.overlay').fadeIn();

    //                 console.log("成功");
    //             },
    //             error:function() {
    //                 console.log("通信失敗");
    //             },
    //         })
    //     };

    // });
  



    
});