@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center">
    <h4 class="gradation02 mb-5">全ユーザ一覧</h4>
</div>
<div class="d-flex justify-content-center">
 <div class="col-5 ml-3">
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th>ユーザ一覧</th>
                 <th>ステータス</th>
                 <th></th>
             </tr>
         </thead>
         <tbody>
            @foreach($users as $user)
             <tr>
                <td>{{ $user['name'] }}</td>
                @if($user['ban_flg'] == 1)
                <td>利用停止中</td>
                @elseif($user['ban_flg'] == 0)
                <td></td>
                @endif
                <td><a href="{{ route('system.edit',['system' => $user['id']],'edit') }}" class="text-decoration-none">利用停止</a>
                /
                <a href="{{ route('system.edit',['system' => $user['id']],'edit') }}" class="text-decoration-none">解除</a></td>
            </tr>
            @endforeach 
         </tbody>
     </table>
 </div>
</div>
<div class="d-flex justify-content-center">
<button class="btn  btn-danger shadow btn-lg gradation02 shadow" onclick="history.back('/display')">戻る</button>
</div>


<br>
<br>
<br>
<br>
<br>
<br>


<style>
    .gradation02 {
    background:linear-gradient(to right, #ff7f50 0%, #c71585 100%);color: transparent;
    -webkit-background-clip: text;
    display: inline-block;
    font-weight:bold;
}
</style>
@endsection