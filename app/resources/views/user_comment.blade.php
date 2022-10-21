@extends('layouts.app')
@section('content')


<h5 class="d-flex justify-content-center">{{ Auth::user()->name }}さんのコメント一覧</h5>

<div class="d-flex justify-content-center">
 <div class="col-5 ml-3">
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th>コメント</th>
                 <th>評価</th>
             </tr>
         </thead>
         <tbody>
            @foreach($comments as $comment)
             <tr>
                 <td>{{ $comment['comment'] }}</td>
                 <td>{{ $comment['good'] }}</td>
                 <td>
                    <a href="{{ route('display.edit',['display' => $comment['id']],'edit') }}">編集</a>
                    <a href="{{ route('comment.del',['id' => $comment['id']]) }}">削除</a>
                    </form>
                </td>
            </tr>
            @endforeach       
         </tbody>
     </table>
 </div>
</div>

<a href="{{ route('display.create') }}" class="text-decoration-none d-flex justify-content-center">
    コメント投稿
</a>
@endsection