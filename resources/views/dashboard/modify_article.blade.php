@extends('layouts.panel.panel')
@section("subtitle") - ویرایش مقاله @endsection
@section("header")

    <script src="{{asset('app/controllers/articles.js')}}" type="text/javascript"></script>
    <script>
        angular.module("minuut").constant("CSRF_TOKEN", '{{ csrf_token() }}');
    </script>




@endsection
@section('content')
    <div class="container" ng-controller="articlesCtrl">
<h1>انتشار مقاله</h1>
<form action="{{route("modifyArticle")}}">
    <input type="hidden" value="{{$id}}" name="id">
    <div class="row" style="padding-bottom: 5px"> <div class="col-sm-1">            موضوع:
        </div>
        <div class="col-sm-6">          <input type="text" id="subject" name="subject" value="{{$subject}}"  class="form-control">
        </div>
    </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="row"> <div class="col-sm-1">            متن:
            </div>
            <div class="col-sm-8">

                <textarea class="summernote form-control" data-height="200" data-lang="en-US" name="content">{{$content}}</textarea>
            </div>
        </div>
    <div class="row">
        <div class="col-lg-2" style="margin-top: 10px"><a href="{{URL::previous()}}" class="btn btn-danger" style="margin-left: 5px" >انصراف</a><input type="submit"  class="btn btn-success" value="انتشار" ></div>

    </div>

</form>
    </div>




@endsection
