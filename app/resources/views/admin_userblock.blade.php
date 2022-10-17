@extends('layouts.app')
@section('content')

@if($users['ban_flg'] === 0)
<div class="d-flex justify-content-center">
    <h4>このユーザを利用停止にしますか？</h4>
</div>
<div class="d-flex justify-content-center">
    <h5>【{{ $users['name'] }}】</h5>
</div>
<div class="d-flex justify-content-center">
    <a href="{{ route('system.show',['system' => $users['id'] ]) }}">利用停止</a>
</div>
@elseif($users['ban_flg'] === 1)
<div class="d-flex justify-content-center">
    <h4>このユーザを利用停止を解除しますか？</h4>
</div>
<div class="d-flex justify-content-center">
    <h5>【{{ $users['name'] }}】</h5>
</div>
<div class="d-flex justify-content-center">
    <a href="{{ route('system.show',['system' => $users['id'] ]) }}">利用停止解除</a>
</div>
@endif
@endsection