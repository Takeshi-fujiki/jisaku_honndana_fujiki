@extends('layouts.app')
@section('content')

<div class="d-flex align-items-center flex-column mb-3">
    <h1 class="mb-5">ユーザ管理</h1>

<a class="btn  btn-danger bg-gradient p-2 bd-highlight shadow mb-3" style="width:200px" href="{{ route('admin.index') }}">全ユーザ一覧</a>
<a class="btn  btn-danger bg-gradient p-2 bd-highlight shadow mb-3" style="width:200px" href="{{ route('admin_exceed') }}">返却期限超過者リスト</a>
<a class="btn  btn-danger bg-gradient p-2 bd-highlight shadow mb-3" style="width:200px" href="{{ route('admin_upclose') }}">返却期限間近者リスト</a>
<a class="btn  btn-danger bg-gradient p-2 bd-highlight shadow mb-3" style="width:200px" href="{{ url('admin_blackList') }}">ブラックリスト</a>
</div>

<div class="d-flex justify-content-center">
<button class="btn  btn-danger bg-gradient" onclick="history.back()">戻る</button>
</div>
@endsection