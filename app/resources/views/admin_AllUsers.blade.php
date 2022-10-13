@extends('layouts.layout')
@section('content')

<div class="d-flex justify-content-center">
 <div class="col-5 ml-3">
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th>ユーザ一覧</th>
                 <th>貸し出し中の本</th>
                 <th>期間</th>
             </tr>
         </thead>
         <tbody>
            @foreach($users as $user)
             <tr>
                 <td>{{ $user['name'] }}</td>
                 <td>○○</td>
                 <td>○○</td>
            </tr>
            @endforeach       
         </tbody>
     </table>
 </div>
</div>
<div class="d-flex justify-content-center">
<button class="btn  btn-primary btn-lg" onclick="history.back('/display')">戻る</button>
</div>
@endsection