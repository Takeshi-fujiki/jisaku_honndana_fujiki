@extends('layouts.app')
@section('content')

@if($book['lending'] === 1)
<div class="d-flex justify-content-center">
    <h4>ありがとうございました☆</h4>
</div>
<div class="d-flex justify-content-center mb-3">
    <div class="mybooks">
        <div class="mybooks1 text-center">
            <a href=""><img src="{{ asset('storage/images/'.$book['image_path']) }}" width="150" height="230" alt="mybook"></a>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    <p>【{{ $book['name'] }}】</p>
    <p>を借りました。</p>
</div>
<div class="d-flex justify-content-center text-danger">
    <h5>返却期限は</h5>
    <h5>【{{ $week }}】です。</h5>
</div>
<div class="d-flex justify-content-center">
    <a href="{{ route('display.show',['display' => Auth::id() ]) }}">TOPへ戻る</a>
</div>

@elseif($book['lending'] === 0 )
<div class="d-flex justify-content-center">
    <h4>ありがとうございました☆</h4>
</div>
<div class="d-flex justify-content-center mb-3">
    <div class="mybooks">
        <div class="mybooks1 text-center">
            <a href=""><img src="{{ asset('storage/images/'.$book['image_path']) }}" width="150" height="230" alt="mybook"></a>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    <p>【{{ $book['name'] }}】</p>
    <p>を返却しました</p>
</div>
<div class="d-flex justify-content-center">
    <a href="{{ route('display.show',['display' => Auth::id() ]) }}">TOPへ戻る</a>
</div>
@endif
@endsection