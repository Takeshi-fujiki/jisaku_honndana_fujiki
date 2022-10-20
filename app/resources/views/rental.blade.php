@extends('layouts.app')
@section('content')

@if($books['lending'] == 0 )
<div class="d-flex justify-content-center">
    <h4>こちらの本を借りますか？</h4>
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
    <a href="{{ route('search.edit',['search' => $books['id']],'edit') }}">借りる</a>
</div>

@elseif($books['lending'] == 1 )
<div class="d-flex justify-content-center">
    <h4>こちらの本を返却しますか？</h4>
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
    <a href="{{ route('search.edit',['search' => $books['id']],'edit') }}">返却</a>
</div>

@endif
@endsection