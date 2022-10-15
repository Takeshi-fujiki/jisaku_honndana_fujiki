@extends('layouts.layout')
@section('content')

@if($book['lending'] === 1)
<div class="d-flex justify-content-center">
<h4>ありがとうございました☆</h4>
</div>
<div class="d-flex justify-content-center">
<p>{{ $book['name'] }}を借りました</p>
</div>
<div class="d-flex justify-content-center">
<a href="{{ url('/display') }}">TOPへ戻る</a>
</div>
@else
<p>{{ $echo }}</p>
<a href="{{ url('/display') }}">TOPへ戻る</a>
@endif
@endsection