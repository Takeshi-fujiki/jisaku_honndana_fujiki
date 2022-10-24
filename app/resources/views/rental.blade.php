@extends('layouts.app')
@section('content')

@if($books['lending'] == 0 )
<div class="d-flex justify-content-center mb-5">
    <h4 class="gradation02">こちらの本を借りますか？</h4>
</div>
<div class="d-flex justify-content-center mb-3">
    <div class="mybooks">
        <div class="mybooks1 text-center">
            <a href=""><img src="{{ asset('storage/images/'.$books['image_path']) }}" width="150" height="230" alt="mybook"></a>
            <h5>{{ $books['name'] }}</h5>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    <a href="{{ route('search.edit',['search' => $books['id']],'edit') }}" class="btn btn-primary shadow btn-lg gradation02">
        借りる
    </a>
</div>

@elseif($books['lending'] == 1 )
<div class="d-flex justify-content-center mb-5">
    <h4 class="gradation02">こちらの本を返却しますか？</h4>
</div>
<div class="d-flex justify-content-center mb-3">
    <div class="mybooks">
        <div class="mybooks1 text-center ">
            <a href=""><img src="{{ asset('storage/images/'.$books['image_path']) }}" width="150" height="230" alt="mybook"></a>
            <h5>{{ $books['name'] }}</h5>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    <a href="{{ route('search.edit',['search' => $books['id']],'edit') }}" class="btn btn-primary shadow btn-lg gradation02">
        返却
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