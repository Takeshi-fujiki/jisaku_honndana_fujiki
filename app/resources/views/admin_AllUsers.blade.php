@extends('layouts.app')
@section('content')

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
<button class="btn  btn-danger bg-gradient shadow btn-lg" onclick="history.back('/display')">戻る</button>
</div>
@endsection