@extends('layouts.app_home')

@section('content')
<div class="container" >
<img src="{{asset($imageUrl)}}" style="max-width: 300px;max-height: 400px">
    <form action="{{url('/profile/image/upload')}}" method="post" enctype="multipart/form-data" >
               {{ csrf_field() }}
               <label class="uploadLbl btn btn-default" >
    <input type="file" name="image" id="image" style="display: none;">

     گزینش عکس
    </label>
    <input type="submit" value="آپلود عکس" name="image" class="btn btn-success">
</form>
</div>
@endsection
