@extends('layouts.app_home')

@section('content')
    <div class="row"  id="mp" dataLat="36.218367" dataLon="53.737187">


        <div class="col-sm-8 col-sm-offset-2">

            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h1 style="text-align: center">تماس با ما</h1>

                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <br>
                    <div id="showcase-loader" style="display: none;">

                    </div>
                    <div id="owl-demo" class="owl-carousel owl-theme" style="display: block; opacity: 1;">








                    </div>
                </div>
            </div>

            <div class="row">
                <br>

                <div class="col-sm-12">
                    <h4>شماره تماس: <small>۰۹۱۱۳۰۷۳۰۰۵ حسن ابن عباس</small></h4>
                    <h4>آدرس: <small>تلمادره، جنب سوپرمارکت باداب سورت</small></h4>
                    <p></p>



                    <br>
                    <div class="visible-md visible-lg">




                        </div>
                    </div>




                </div>
            </div>



        </div>
        <div class="col-sm-8 col-sm-offset-2" id="portamento_container" >
            <label>در نقشه:</label>

                <div id="map" style="min-width: 100%;min-height: 300px"></div>



    </div>

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2" style="padding: 10px">
            <h3 style="text-align: center">فرم تماس</h3>
            <form action="/contact" method="post">
           <div class="row" style="padding-top: 10px">
               <div class="col-sm-3">
                   نام و نام خانوادگی:

               </div>
               <div class="col-sm-6">

                   <div class="form-group">

                       <input type="text" name="name" class="form-control" style="padding-top: 10px">
                   </div>
               </div>
           </div>
                <div class="row" style="padding-top: 10px">
                    <div class="col-sm-3">
                  ایمیل:

                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">

                            <input type="email" name="mail" class="form-control" style="padding-top: 10px">
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 10px">
                    <div class="col-sm-3">
                        متن:

                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">

                            <textarea rows="10" name="name" class="form-control" style="padding-top: 10px"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 10px">
                    <div class="col-sm-10">

                        <div class="form-group">

                            <input type="submit" name="name" class="btn btn-green" style="padding-top: 10px;width: 100%" value="ارسال">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<div class="row">
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


    <script>

        function initMap() {
            var myLatLng = {lat:parseFloat(document.getElementById("mp").getAttribute("dataLat")), lng: parseFloat(document.getElementById("mp").getAttribute("dataLon"))};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: myLatLng
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!'
            });
        }
    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4zpBrH4JFVy_LwzGiHjNR6qGceCUBIZQ&callback=initMap">
    </script>

@endsection