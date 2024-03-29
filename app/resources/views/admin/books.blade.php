@extends('layouts.admin_app')
@section('content')

<div class="d-flex justify-content-center">
    <h2 class="gradation02">本の貸し出し状況</h2>
</div>

<div class="d-flex justify-content-center">
 <div class="col-5 ml-3">
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th></th>
                 <th>本の名前</th>
                 <th>貸出状況</th>
                 <th>貸出中ユーザ</th>
             </tr>
         </thead>
         <tbody>
        @foreach($books as $book)
            <tr>
                <td><img src="{{ asset('storage/images/'.$book['image_path']) }}" width="50" height="70"></td>
                 <td>{{ $book['book_name'] }}</td>
                 @if($book['lending'] === 1)
                 <td>貸出中</td>
                 @elseif($book['lending'] === 0)
                 <td>未貸出</td>
                 @endif
                 <td>{{ $book['name'] }}</td>
            </tr>
        @endforeach
         </tbody>
     </table>
 </div>
</div>

<div class="d-flex justify-content-center">
    <button class="btn  btn-danger shadow btn-lg gradation02 shadow">
        <a href="{{ url('/') }}" class="text-decoration-none text-danger">
            戻る
        </a>
    </button>
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
}
</style>
@endsection
