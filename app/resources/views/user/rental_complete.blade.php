@extends('layouts.app')
@section('content')

@if($book['lending'] === 1)
<div class="d-flex justify-content-center mb-5">
    <h4 class="gradation02">ありがとうございました☆</h4>
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
<div class="d-flex justify-content-center text-danger mb-5">
    <h5>返却期限は</h5>
    <h5>【{{ $week }}】です。</h5>
</div>
<div class="d-flex justify-content-center">
    <a href="{{ route('user.display.show',['display' => Auth::id() ]) }}" class="btn btn-primary shadow btn-lg gradation02">
        TOPへ戻る
    </a>
</div>

@elseif($book['lending'] === 0 )
<div class="d-flex justify-content-center mb-5">
    <h4 class="gradation02">ありがとうございました☆</h4>
</div>
<div class="d-flex justify-content-center mb-3">
    <div class="mybooks">
        <div class="mybooks1 text-center">
            <a href=""><img src="{{ asset('storage/images/'.$book['image_path']) }}" width="150" height="230" alt="mybook"></a>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mb-5">
    <p>【{{ $book['name'] }}】</p>
    <p>を返却しました</p>
</div>
<div class="d-flex justify-content-center">
    <a href="{{ route('user.display.show',['display' => Auth::id() ]) }}" class="btn btn-primary shadow btn-lg gradation02">
        TOPへ戻る
    </a>
</div>
@endif

<br>
<br>
<br>
<br>
<br>


<style>
    .gradation02 {
    background:linear-gradient(to right, #0000cd 0%, #00ffff 100%);color: transparent;
    -webkit-background-clip: text;
    display: inline-block;
    font-weight:bold;
}
</style>
@endsection