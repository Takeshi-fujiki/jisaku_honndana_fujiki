@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center">
    <h2>本の貸し出し状況</h2>
</div>

<div class="d-flex justify-content-center">
 <div class="col-5 ml-3">
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th>本の名前</th>
                 <th>貸出状況</th>
                 <th>貸出中ユーザ</th>
             </tr>
         </thead>
         <tbody>
        @foreach($books as $book)
            <tr>
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
    <button class="btn  btn-danger bg-gradient shadow" onclick="history.back()">戻る</button>
</div>
@endsection
