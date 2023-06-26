$(function () {
    let like = $('.like-toggle'); //like-toggleのついたiタグを取得し代入。
    let likeBookId; //変数を宣言（なんでここで？）
    like.on('click', function () { //onはイベントハンドラー
        let child = $(this).find('.like');
        let $this = child; //this=イベントの発火した要素＝iタグを代入
        likeBookId = child.data('book-id'); //iタグに仕込んだdata-review-idの値を取得
        // console.log(likeBookId);
            //ajax処理スタート
            $.ajax({
            headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },  //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
            url: '/user/like', //通信先アドレスで、このURLをあとでルートで設定します
            method: 'POST', //HTTPメソッドの種別を指定します。1.9.0以前の場合はtype:を使用。
            data: { //サーバーに送信するデータ
                'book_id': likeBookId //いいねされた投稿のidを送る
            },
            })
            //通信成功した時の処理
            .done(function (data) {
                // console.log(data['length']);
                if(data['length'] == 1){
                    // console.log(12);
                    $this.removeClass('fa-regular fa-star');
                    $this.addClass('fa-solid fa-star icon');
                }else{
                    $this.removeClass('fa-solid fa-star icon');
                    $this.addClass('fa-regular fa-star');
                }
            })
            //通信失敗した時の処理
            .fail(function () {
            console.log('fail'); 
            });

    });
    });