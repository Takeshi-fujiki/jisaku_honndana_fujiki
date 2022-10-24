@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center">
    <h3 class="gradation02 mb-5">返却期限間近者リスト</h3>
</div>

<div class="d-flex justify-content-center">
 <div class="col-5 ml-3">

     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th>返却超過:1日前</th>
                 <th>返却日</th>
                 <th></th>
            </tr>
            </thead>
            @foreach($arrays as $array)
            <tbody>
                <tr>
                <td><img src="{{ asset('storage/images/'.$array['image_path']) }}" width="50" height="70" alt="mybook"></td>
                    <td>{{ $array['name'] }}</td>
                    <td>{{ $array['date'] }}</td>
                </tr>
            </tbody>
            @endforeach
     </table>
     

     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th>返却超過:3日前</th>
                 <th>返却日</th>
                 <th></th>
            </tr>
            </thead>
            @foreach($arrays as $array)
            <tbody>
            <tr>
            <td><img src="{{ asset('storage/images/'.$array['image_path']) }}" width="50" height="70" alt="mybook"></td>
                <td>{{ $array['name'] }}</td>
                <td>{{ $array['date'] }}</td>
            </tr>
         </tbody>
         @endforeach
     </table>
 </div>
</div>
<div class="d-flex justify-content-center">
<button class="btn  btn-danger shadow btn-lg gradation02 shadow" onclick="history.back('/display')">戻る</button>
</div>


<style>
    .gradation02 {
    background:linear-gradient(to right, #ff7f50 0%, #c71585 100%);color: transparent;
    -webkit-background-clip: text;
    display: inline-block;
    font-weight:bold;
}
</style>
@endsection