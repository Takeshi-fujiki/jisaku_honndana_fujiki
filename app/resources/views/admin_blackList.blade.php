@extends('layouts.layout')
@section('content')

<div class="d-flex justify-content-center">
 <div class="col-5 ml-3">
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th>ブラックリスト</th>
                 <th></th>
                 <th></th>
             </tr>
         </thead>
         <tbody>
             <tr>
                 <td>ユーザ名</td>
                 <td></td>
                 <td><a href="">利用停止</a>・<a href="">解除</a></td>
            </tr>
         </tbody>
     </table>
 </div>
</div>
<div class="d-flex justify-content-center">
<button class="btn  btn-primary btn-lg" onclick="history.back('/display')">戻る</button>
</div>
@endsection