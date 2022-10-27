@extends('layouts.app')
@section('content')

<div class="d-flex align-items-center flex-column mb-3">
    <h1 class="mb-5 gradation02">ユーザ管理</h1>

<a class="btn  btn-danger shadow btn-lg gradation02 shadow mb-3" style="width:250px" href="{{ route('admin.index') }}">全ユーザ一覧</a>
<a class="btn  btn-danger shadow btn-lg gradation02 shadow mb-3" style="width:250px" href="{{ route('admin_exceed') }}">返却期限超過者リスト</a>
<a class="btn  btn-danger shadow btn-lg gradation02 shadow mb-3" style="width:250px" href="{{ route('admin_upclose') }}">返却期限間近者リスト</a>
</div>

<div class="d-flex justify-content-center">
<button class="btn  btn-danger shadow btn-lg gradation02 shadow" onclick="history.back()">戻る</button>
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