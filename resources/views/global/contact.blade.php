@extends('layouts.app_home')
@section('header')

@endsection
@section('content')
    <div class="jumbotron jumbotron-fluid" style="text-align: center;margin-bottom: 0">

        <div class="container">
            <h1 class="display-3">تماس با ما</h1>
            <p class="lead">با ما می توانید از راههای زیر تماس بگیرید</p>
            <hr class="my-4">

        </div>

    </div>
    <div class="jumbotron jumbotron-fluid" style="text-align: center;margin-top: 0;margin-bottom: 0px;background-color: #c7ddef;">

        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>ایمیل</h3>
                            <p>شما می توانید با ما از طریق ایمیل در تماس باشید</p>
                            <p><a href='mailto:support@minuut.ir' style="color: #0f0f0f">support@minuut.ir</a> </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>تلفن</h3>
                            <p>شما می توانید با ما از طریق تلفن با ما تماس بگیرید</p>

                            <p>09302330023</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>آدرس</h3>
                            <p>شما همچنین می توانید به آدرس شرکت حضوری بیاید</p>
                            <p>ساری، خیابان خیام، کوچه مهربانیان</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <footer class="footer">
        <div class="container" style="text-align: center;padding-top: 20px">
            <span class="text-muted">حق تالیف برای مینوت محفوظ می باشد.</span>
        </div>
    </footer>


@endsection