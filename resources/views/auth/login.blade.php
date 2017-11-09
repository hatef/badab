@extends('../layouts/app_home')
@section("body_style")
    style="background-color:#F0F0F0"
@endsection
@section('content')

<div class="container " style="text-align: center;" >

    <div class="row">
        <div class="col-md-6 col-sm-offset-3 ">
            <h4>ورود به حساب کاربری</h4>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">نام کاربری (ایمیل)</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">رمز عبور</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    {{--<label>--}}
                                        {{--<input type="checkbox" name="remember"> ذخیره--}}
                                    {{--</label>--}}
                                </div>
                            </div>
                        </div>
                        {{--<div class="g-recaptcha" data-sitekey="6LfDwyMUAAAAAMdR-5gc9QfBtcITtfU1WUIIVh8-"></div>--}}
                        <div class="form-group">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-success" style="min-width: 100%">
                                    ورود
                                </button>

                                <a class="btn btn-link" style="color: #0f0f0f" href="{{ url('/password/reset') }}">
                                    رمز عبورتان را فراموش کرده اید؟
                                </a>
<br>

                            </div>
                        </div>
                    </form>

        </div>
    </div>
</div>
@endsection
