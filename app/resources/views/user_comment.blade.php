@extends('layouts.app')
@section('content')


<h5 class="d-flex justify-content-center gradation02">{{ Auth::user()->name }}さんのコメント一覧</h5>

<div class="d-flex justify-content-center">
 <div class="col-5 ml-3">
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th></th>
                 <th>コメント</th>
                 <th>評価</th>
                <th></th>
             </tr>
         </thead>
         <tbody>
            @foreach($comments as $comment)
            <tr>
                <td><img src="{{ asset('storage/images/'.$comment['image_path']) }}" width="50" height="70"></td>
                 <td>{{ $comment['comment'] }}</td>
                 <td>{{ $comment['good'] }}</td>
                 <td>
                    <a href="{{ route('display.edit',['display' => $comment['id']],'edit') }}" class="text-decoration-none">編集</a>
                    <a href="{{ route('comment.del',['id' => $comment['id']]) }}" class="text-decoration-none">削除</a>
                </td>
            </tr>
            @endforeach       
         </tbody>
     </table>
 </div>
</div>


<div class="d-flex justify-content-center">
    <button class="btn  btn-primary shadow btn-lg gradation02 shadow" onclick="history.back('/display')">戻る</button>
    <a href="{{ route('display.create') }}" class="btn btn-primary shadow btn-lg gradation02 text-decoration-none">
    コメント投稿
    </a>
</div>

<br>
<br>
<br>
<br>
<br>

<style>
.gradation02 {
    background:linear-gradient(to right, #1b53d2 0%, #2fe2ff 100%);color: transparent;/*文字色を透明に*/
    -webkit-background-clip: text;/*chromeとSafari用、背景色を文字でクリップ*/
    display: inline-block;
}
</style>
@endsection