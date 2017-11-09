@extends('layouts.app_home')

@section('content')
    <div class="row"  id="mp" dataLat="{{$location[0]}}" dataLon="{{$location[1]}}">


        <div class="col-sm-8 col-sm-offset-2">

            <div class="row">
                <div class="col-sm-5 col-xs-8">
                    <h3>{{$property->title}}</h3>
                    <h6>{{$property->place}}</h6>

                </div>
                <div class="col-sm-4 text-right pull-right">
                    <h2 class="text-right"><small>{{toFarsiDigits(number_format($property->price,2))}} تومان</small></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <br>
                    <div id="showcase-loader" style="display: none;">

                    </div>
                    <div id="owl-demo" class="owl-carousel owl-theme" style="display: block; opacity: 1;">
<img src="{{asset($property->image)}}" style="min-width: 100%;min-height: 60%;max-width: 400px;max-height: 400px">







                    </div>
                </div>
            </div>

            <div class="row">
                <br>

                <div class="col-sm-12">
                    <h4>توضیحات</h4>
                    <p>{{$property->description}}</p>



                    <div class="row" style="padding-top: 40px">
                        <div class="col-sm-3 col-xs-6">
                            <small>مساحت:</small> <b>{{$property->area}} متر</b>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <small>نوع ملک:</small> <b>{{$property->type}} </b>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <ul>
                                <small>نوع معامله:</small> <b>{{$property->deal_type}} </b>
                            </ul>
                        </div>

                    </div>
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
                title: 'Hello World!',
                icon:'/badab/public/images/hmarker.png'
            });
        }
    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4zpBrH4JFVy_LwzGiHjNR6qGceCUBIZQ&callback=initMap">
    </script>

@endsection