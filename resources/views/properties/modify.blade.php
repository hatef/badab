@extends('layouts.app_home')

@section('content')
    <form action="{{route("modify_property")}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row" id="mp" dataLat="{{explode(",",$property->location)[0]}}" dataLon="{{explode(",",$property->location)[1]}}">
            <div class="col-sm-4 col-sm-offset-2">
                <div class="form-group">
                    <label>عنوان:</label>
                    <input type="hidden" name="id" class="form-control" value="{{$property->id}}">
                    <input type="text" name="title" class="form-control" value="{{$property->title}}" required>
                </div>

            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label>شهر:</label>
                    <input type="text" name="place" class="form-control" value="{{$property->place}}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="form-group">
                    <label>توضیحات:</label>
                    <textarea type="text" name="description" class="form-control" required>{{$property->description}}</textarea>
                </div>

            </div>

        </div>


        <div class="row">
            <div class="col-sm-4 col-sm-offset-2">
                <div class="form-group" >
                    <label>نوع معامله:</label>
                    <select class="form-control" name="deal_type" required>
                        <option value="{{$property->deal_type}}"></option>
                        <option value="فروش">فروش</option>
                        <option value="اجاره">اجاره</option>

                    </select>
                </div>

            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label >نوع ملک:</label>
                    <input type="text" name="type" class="form-control" value="{{$property->type}}" required>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-sm-4 col-sm-offset-2">
                <div class="form-group" >
                    <label>قیمت/اجاره:</label>
                    <input type="text" name="price" class="form-control" value="{{$property->price}}" required>
                </div>

            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label >مساحت:</label>
                    <input type="number" name="area" class="form-control" value="{{$property->area}}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-2">
                <div class="form-group" >
                    <label>سن بنا:</label>
                    <input type="text" name="age" class="form-control" value="{{$property->age}}" required>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group" >
                    <label>رهن(در صورت اجاره دادن):</label>
                    <input type="text" name="deposit" class="form-control" value="{{$property->deposit}}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 col-sm-offset-2">
                <div class="form-group" >
                    <label>نام مالک:</label>
                    <input type="text" name="owner" class="form-control"  value="{{$property->owner}}">
                </div>

            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label >شماره تماس مالک:</label>
                    <input type="number" name="phone" class="form-control"  value="{{$property->phone}}">
                </div>
            </div>
        </div>
        <div class="row" style="padding-bottom:20px;padding-top: 10px">
            <div class="col-sm-8 col-sm-offset-2">
                <label>
                    مشخصات مکانی:
                </label>
                <div id="map" style="min-width: 100%;min-height: 300px"></div>
                <input type="hidden" class="form-control" name="location" id="locat" value="{{$property->location}}">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 col-sm-offset-2">
                <label class="uploadlbl btn btn-warning" style="margin-bottom: 10px" >
                    <input type="file" name="file">
                    گزینش عکس
                </label>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <input type="submit" class="btn btn-primary" style="min-width: 100%" value="ویرایش">
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
    </form>
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script>$('#lfm').filemanager('image');


    </script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $( function() {
            $('#place').on('keyup',function () {



                $.get( "http://localhost:8888/badab/public/api/cities?city="+$("#place").val() )
                    .done(function( data ) {

                        var cities=$.parseJSON(data);
                        $( "#place" ).autocomplete({
                            source: cities
                        });
                    });

            });
            $('#type').on('keyup',function () {



                $.get( "http://localhost:8888/badab/public/api/types?city="+$("#type").val() )
                    .done(function( data ) {

                        var types=$.parseJSON(data);
                        $( "#type" ).autocomplete({
                            source: types
                        });
                    });

            });

        } );
    </script>

    <script>

        function initMap() {
            var myLatLng = {lat:parseFloat(document.getElementById("mp").getAttribute("dataLat")), lng: parseFloat(document.getElementById("mp").getAttribute("dataLon"))};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: myLatLng
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!',
                draggable: true,
                icon:'/badab/public/images/hmarker.png'
            });

            google.maps.event.addListener(
                marker,
                'drag',
                function() {
                    document.getElementById('locat').value = marker.position.lat()+","+marker.position.lng();
                }
            );
        }
    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4zpBrH4JFVy_LwzGiHjNR6qGceCUBIZQ&callback=initMap">
    </script>



@endsection