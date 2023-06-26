@extends('layouts.admin_app')
@section('content')

<div class="d-flex align-items-center flex-column">
    <h2 class="mb-5 gradation02">管理者メニュー</h2>

    <a class="btn  btn-danger shadow btn-lg gradation02 shadow mb-5" style="width:200px" href="{{ route('admin.admin.show',['admin' => 1]) }}">本の貸し出し状況</a>
    <a class="btn  btn-danger shadow btn-lg gradation02 shadow mb-5" style="width:200px" href="{{ url('admin.admin_add_books') }}">本の追加</a>
    <a class="btn  btn-danger shadow btn-lg gradation02 shadow mb-5" style="width:200px" href="{{ url('admin.admin_users') }}">ユーザ管理</a>
</div>

<style>
    .gradation02 {
    background:linear-gradient(to right, #ff7f50 0%, #c71585 100%);color: transparent;
    -webkit-background-clip: text;
    display: inline-block;
    font-weight:bold;
}
</style>
@endsection
