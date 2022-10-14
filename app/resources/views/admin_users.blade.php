@extends('layouts.layout')
@section('content')

<h1>ユーザ管理</h1>
<a class="btn  btn-primary" href="{{ route('admin.index') }}">全ユーザ一覧</a>
<a class="btn  btn-primary" href="{{ url('admin_exceed') }}">返却期限超過者リスト</a>
<a class="btn  btn-primary" href="{{ url('admin_UpClose') }}">返却期限間近者リスト</a>
<a class="btn  btn-primary" href="{{ url('admin_blackList') }}">ブラックリスト</a>
<button class="btn  btn-primary" onclick="history.back()">戻る</button>
@endsection