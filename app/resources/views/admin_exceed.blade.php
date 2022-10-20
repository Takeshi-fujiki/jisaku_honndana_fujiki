@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center">
    <h3>返却期限超過者リスト</h3>
</div>

<div class="d-flex justify-content-center">
 <div class="col-5 ml-3">
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th>返却超過:1ヶ月以上</th>
                 <th>返却日</th>
                 <th></th>
             </tr>
         </thead>
         <tbody>
            @foreach($dates as $date)
             <tr>
                 <td>{{ $date['name'] }}</td>
                 <td>{{ $date['date'] }}</td>
                 <td></td>
            </tr>
            @endforeach
         </tbody>
     </table>

     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th>返却超過:2週間以上</th>
                 <th>返却日</th>
                 <th></th>
             </tr>
         </thead>
         <tbody>
            @foreach($users as $user)
             <tr>
                 <td>{{ $user['name'] }}</td>
                 <td>{{ $user['date'] }}</td>
                 <td></td>
            </tr>
            @endforeach
         </tbody>
     </table>
 </div>
</div>
<div class="d-flex justify-content-center">
<button class="btn  btn-danger bg-gradient shadow btn-lg" onclick="history.back('/display')">戻る</button>
</div>
@endsection