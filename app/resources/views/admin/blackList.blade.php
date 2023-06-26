@extends('layouts.admin_app')
@section('content')

<div class="d-flex justify-content-center mb-5">
    <h4 class="gradation02">ブラックリスト</h4>
</div>
<div class="d-flex justify-content-center">
 <div class="col-5 ml-3">
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th></th>
                 <th></th>
                 <th></th>
             </tr>
         </thead>
         <tbody>
             <tr>
                 <td>ユーザ名</td>
                 <td><a href="" class="text-decoration-none">利用停止</a>/<a href="" class="text-decoration-none">解除</a></td>
                 <td></td>
            </tr>
         </tbody>
     </table>
 </div>
</div>
<div class="d-flex justify-content-center">
<button class="btn  btn-danger shadow btn-lg gradation02 shadow" onclick="history.back('/display')">戻る</button>
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