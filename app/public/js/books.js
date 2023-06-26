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
                url:"/user/search/"+id+"/edit",
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
       

    
    // 本の検索画面から本を借りる時

    $(".rtl").on("click",function(event){

        event.preventDefault();
        let modal = $(this).find('.modal-rental');
        console.log(123444);
        // let next = book.next('.modal-rental')
        
        $(modal).fadeIn();  
        $(".overlay").fadeIn();
        
        
        // let rtl = book.data('book');
        let back = $(this).find('.back');
        let back2 = back.find('.back2');
        // console.log(back2);
        $(back2).on("click",function(event) {
            event.preventDefault();
            $(modal).fadeOut();  
            $(".overlay").fadeOut(); 
            return false;
        })

        let modal2 = $(this).find('.modal-rental2');
        let rent = $(this).find('.back');
        let rental = rent.find('.rental2');
        $(rental).on('click',function(event) {
            event.preventDefault();
            get_data2(modal2);
        })


        function get_data2(modal2) {
        
            // console.log(rental);
            let id = rental[0].dataset.rental
            // let data = document.getElementById(name);
            // let id = name[0].dataset.rental;
            // console.log(id);
            let mod = modal2;
            $.ajax({
                url:"/user/search/"+id+"/edit",
                type:"GET",
                dataType:"json",
                data:{
                    "lending" : 1,
                },
                success:function() {
                     // console.log(modal2);
                     $(mod).fadeIn();  
                     $(".overlay").fadeIn(); 
                    console.log("成功");
                },
                error:function() {
                    console.log("通信失敗");
                },
            })
        };
    });
  

    $('.mod').on('click',function(event) {
        event.preventDefault();
        let mod = $(this).parent();
        let find = mod.find('#mod2');
        $(find).modal();
    });


    $('.edit-btn').on('click',function(event){
        event.preventDefault();
        let mod = $(this).parent();
        let find = mod.find('#comment-edit');
        $(find).modal();
    })

    $('.delete-btn').on('click',function(event){
        event.preventDefault();
        let mod = $(this).parent();
        let find = mod.find('#comment-delete');
        $(find).modal();
    })


    
});