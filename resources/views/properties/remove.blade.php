@extends('layouts.app_home')

@section('content')
    <form action="" method="post">
    <div class="row" style="margin-top: 100px">
        {{csrf_field()}}
        <div class="col-sm-8 col-sm-offset-2" style="text-align: center">
            <label>آیا از حذف این ملک اطمینان دارید؟</label>
            <div class="row" id="mp" dataLat="36.5682654" dataLon="53.0607982">
                <div class="col-sm-5 col-sm-offset-1"><input type="submit" value="انصراف" name="remove" class="btn btn-default" style="min-width: 100%"></div>
                <div class="col-sm-5"><input type="submit" value="حذف" name="remove" class="btn btn-danger" style="min-width: 100%"></div>
            </div>
        </div>
    </div>
    </form>

    <div class="row" style="margin-top: 100px">
        <div class="col-sm-12">
            <footer style="direction: rtl !important; text-align: center">
                <hr />
                <p>

                    تمامی حقوق این سایت برای مالک آن محفوظ است. | طراح: هاتف شمشیری
                </p>
                <br>
                @if(Auth::guest())
                    <a href="{{url("/login")}}">ورود</a>
                @endif
            </footer>
        </div>
    </div>
@endsection