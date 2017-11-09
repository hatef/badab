@extends('../layouts/panel/panel')
@section("subtitle") - پروفایل @endsection
@section('content')
<div class="container" style="padding-top: 30px">
    <form method="post" action="{{url('/profile/update')}}" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label  for="name">نام: </label>
                </div>
                <div class="col-md-6">
                    <input type="text" id="name" name="name" class="form-control" value="{{Auth::user()->profile->name}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label  for="sex">جنسیت</label>
                </div>
                <div class="col-md-6">
<div class="btn-group" data-toggle="buttons">
<label  style="padding-left: 10px">
    مرد
</label>
    <input type="radio"  id="sex" name="sex" value="male" @if(Auth::user()->profile->sex=="male") checked @endif>
    <label style="padding-right: 30px;padding-left: 10px">
        زن

    </label>
    <input type="radio" id="sex" name="sex" value="female" @if(Auth::user()->profile->sex=="female") checked @endif>


</div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label  for="last_name">شماره تماس:</label>
                </div>
                <div class="col-md-6">
                    <input type="tel" id="tell" name="tell" class="form-control" class="left_to_right" value="{{Auth::user()->profile->phone}}">
                </div>
            </div>
        </div>
        {{--<div class="form-group">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-3">--}}
                    {{--<label  for="last_name">شماره فکس:</label>--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--<input type="tel" id="fax" name="fax" class="form-control" value="{{$currentProfile->fax}}">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-3">--}}
                    {{--<label  for="last_name">آدرس وبسایت:</label>--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--<input type="url" id="website" name="website" class="form-control" value="{{$currentProfile->website}}">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label  for="last_name">تاریخ تولد:</label>
                </div>
                <div class="col-md-1">
                    <input type="text" name="day" class="form-control" placeholder="{{trans("profile.day")}}" value="{{$currentProfile->day}}"/>
                </div>
                <div class="col-md-2">
                    <select class="form-control" name="month">
                        <option>{{trans("profile.month")}}</option>
                        @foreach(trans("profile.months") as $key=>$month)
                            <option value="{{$key}}" @if($currentProfile->month==$key) selected="selected" @endif>{{$month}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-md-1">
                    <select class="form-control" name="year">

                        <option>{{trans("profile.year")}}</option>
                        @foreach(trans("profile.years") as $year)
                            <option value="{{$year}}" @if($currentProfile->year==$year) selected="selected" @endif>{{$year}}</option>
                        @endforeach

                    </select>
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label  for="contact_email">آدرس ایمیل تماس:</label>
                </div>
                <div class="col-md-6">
                    <input type="email" id="contact_email" name="contact_email" class="form-control" value="{{Auth::user()->email}}">
                </div>
            </div>
            </div>

        {{--<div class="form-group">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-3">--}}
                    {{--<label  for="last_name">درباره:</label>--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--<textarea name="about" class="form-control" rows="10">{{$currentProfile->about}}</textarea>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-3">--}}
                    {{--<label  for="last_name">توضیحات تخصصی:</label>--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--<textarea name="specs" class="form-control" rows="10">{{$currentProfile->specification}}</textarea>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-3">--}}
                    {{--<label  for="organization">موسسه:</label>--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--<input type="url" id="organization" name="organization" class="form-control" value="{{$currentProfile->organization}}">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<div class="form-group">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-3">--}}
                    {{--<label  for="city">آدرس:</label>--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--<input type="url" id="address" name="address" class="form-control" value="{{$currentProfile->address}}">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row" style="margin-bottom: 30px"><div class="col-md-3"></div>

            <div class="col-md-6">
                <input type="submit" class="btn btn-block" value="{{trans("profile.save")}}" style="min-width: 100%">
            </div>
        </div>
    </form>
</div>
@endsection
