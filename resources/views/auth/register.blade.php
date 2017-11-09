@extends('../layouts/app_home')
@section("body_style")
    style="background-color:#F0F0F0"
@endsection
@section('content')

<div class="container login_container" >
 <h3 style="text-align: center">عضویت در مینوت</h3>
    <ul>
        <li>تکمیل تمام بخش ها الزامی است.</li>
        <li>رمز عبور باید بین ۸ تا ۱۲ کاراکتر باشد</li>
    </ul>
    <div class="row">
        <div class="col-md-12 ">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">نام و نام خانوادگی</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>





                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">شماره تماس</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="phone" value="{{ old('city') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">آدرس ایمیل</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">رمز عبور</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">تایید رمز عبور</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LfDwyMUAAAAAMdR-5gc9QfBtcITtfU1WUIIVh8-"></div>
<h4>با کلیک روی دکمه ثبت نام، <a href="">قوانین و مقررات</a> مینوت را مطالعه کرده و پذیرفته ام.</h4>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2 " style="text-align: center">
                                <button type="submit" class="btn btn-success" style="min-width: 100%">
                                    ثبت نام
                                </button>
                                <br>
                                <br>
                                اگر عضو هستید وارد شوید
                                <br>
                                <a href="{{url("/login")}}" class="btn btn-default" style="min-width: 100%"> ورود</a>
                            </div>
                        </div>

                    </form>

    </div>
</div>
@endsection
