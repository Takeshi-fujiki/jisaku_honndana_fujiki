@extends('layouts.app')
@section('content')

@if($book['lending'] == 0 )
<div class="d-flex justify-content-center">
    <h4>こちらの本を借りますか？</h4>
</div>
<div class="d-flex justify-content-center">
    <h5>【{{ $book['name'] }}】</h5>
</div>
<div class="d-flex justify-content-center">
    <a href="{{ route('search.edit',['search' => $book['id']],'edit') }}">借りる</a>
</div>

@elseif($book['lending'] == 1 )
<div class="d-flex justify-content-center">
    <h4>こちらの本を返却しますか？</h4>
</div>
<div class="d-flex justify-content-center">
    <h5>【{{ $book['name'] }}】</h5>
</div>
<div class="d-flex justify-content-center">
    <a href="{{ route('search.edit',['search' => $book['id']],'edit') }}">返却</a>
</div>

@endif
@endsection