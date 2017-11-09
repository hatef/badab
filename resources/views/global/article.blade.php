@extends('layouts.app_home')
@section('header')

@endsection
@section('content')
    <div class="container">

        {{$subject}} <br/>
        {!! $content !!}
    </div>




@endsection
