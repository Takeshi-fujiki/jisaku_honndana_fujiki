@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center">
 <div class="col-3 ml-3">
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th>ユーザ一覧</th>
                 <th></th>
             </tr>
         </thead>
         <tbody>
            @foreach($users as $user)
             <tr>
                <td><a href="" class="text-decoration-none">{{ $user['name'] }}</a></td>
                <td><a href="" class="text-decoration-none">利用停止</a></td>
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