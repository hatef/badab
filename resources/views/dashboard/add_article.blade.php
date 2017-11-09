@extends('layouts.panel.panel')
@section("subtitle") - انتشار مقاله @endsection
@section("header")

    <script src="{{asset('app/controllers/articles.js')}}" type="text/javascript"></script>
    <script>
        angular.module("minuut").constant("CSRF_TOKEN", '{{ csrf_token() }}');
    </script>

    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>


@endsection
@section('content')
    <div ng-controller="articlesCtrl">
<h1>انتشار مقاله</h1>
<form action="{{route("addArticle")}}">
    <div class="row" style="padding-bottom: 5px"> <div class="col-sm-1">            موضوع:
        </div>
        <div class="col-sm-6">          <input type="text" id="subject" name="subject"  class="form-control">
        </div>
    </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="row"> <div class="col-sm-1">            متن:
            </div>
            <div class="col-sm-8">
                <textarea class="summernote form-control" data-height="200" data-lang="en-US" name="content"></textarea>


            </div>
        </div>
    <div class="row">
        <div class="col-lg-2" style="margin-top: 10px"><a href="{{URL::previous()}}" class="btn btn-danger" style="margin-left: 5px" >انصراف</a><input type="submit"  class="btn btn-success" value="انتشار" ></div>

    </div>

</form>
    </div>


   <div class="row">
       <div class="col-lg-8">
           <div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> گزینش
     </a>
   </span>
               <input id="thumbnail" placeholder="آپلود عکس" class="form-control" type="text" name="filepath">
           </div>
           <img id="holder" style="margin-top:15px;max-height:100px;">
       </div>
   </div>
    <script>$('#lfm').filemanager('image');</script>

@endsection
