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
                    <div class="edit">
                        <div class="edit-btn">
                            <a href="" class="btn btn-primary shadow gradation02 text-decoration-none">編集</a>
                        </div>

                        <div class="modal fade" id="comment-edit" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="date2" class="modal-title"></h5>
                                    </div>

                                    <form action="{{ route('user.display.update',$comment->id) }}" method="post">
                                    @method('patch')
                                        @csrf
                                        <div class="modal-body">
                                        <img src="{{ asset('storage/images/'.$comment['image_path']) }}" width="60" height="70">
                                            <div class="form-group">
                                                <label class="control-label mb-3" name="date">以前の投稿日：{{ $comment['date']->format('Y-m-d') }}</label>
                                                <input class="form-control mb-3" type="date" name="date" value="">
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label mb-3" name="good">本の評価</label>
                                                <select name="good">
                                                    <option value="">{{ $comment['good'] }}</option>
                                                    <option value="☆">☆</option>
                                                    <option value="☆☆">☆☆</option>
                                                    <option value="☆☆☆">☆☆☆</option>
                                                    <option value="☆☆☆☆">☆☆☆☆</option>
                                                    <option value="☆☆☆☆☆">☆☆☆☆☆</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label mb-3" name="comment">コメント</label>
                                                <textarea type="text" name="comment" class="form-control mb-5">{{ $comment['comment'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                            <button class="btn btn-primary shadow btn-lg gradation02">編集</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="delete">
                        <div class="delete-btn">
                            <a href="" class="btn btn-primary shadow gradation02 text-decoration-none">削除</a>
                        </div>

                        <div class="modal fade" id="comment-delete" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="date2" class="modal-title"></h5>
                                    </div>

                                    <form action="{{ route('user.display.destroy',$comment->id) }}" method="post">
                                    @method('delete')
                                        @csrf
                                        <div class="modal-body">
                                        <img src="{{ asset('storage/images/'.$comment['image_path']) }}" width="60" height="70">
                                            <div class="form-group">
                                                <label class="control-label mb-3" name="date">以前の投稿日：{{ $comment['date']->format('Y-m-d') }}</label>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label mb-3" name="good">本の評価：{{ $comment['good'] }}</label>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label mb-3" name="comment">コメント：</label>
                                                {{ $comment['comment'] }}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                            <button class="btn btn-primary shadow btn-lg gradation02">削除</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </td>
            </tr>
            @endforeach       
         </tbody>
     </table>
 </div>
</div>


<div class="d-flex justify-content-center">
    <button class="btn  btn-primary shadow btn-lg gradation02 shadow" id="back" onclick="history.back('/display')">戻る</button>
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