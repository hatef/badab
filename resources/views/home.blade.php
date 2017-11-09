@extends('layouts.app_home')

@section('content')
    <div class="row">

        <div class="col-sm-5  home_form">

            <div class="col-sm-12 well lform" style="direction: rtl !important;">

                <div class="row" style="direction: rtl !important;">
                    <form class="form-vertical" action="{{route("listing",["sect"=>"index"])}}">
                        <fieldset>
                            <div class="col-sm-12" style="direction: rtl !important;text-align: right !important;">



                                <div class="row">
                                    <div class="col-sm-6" >
                                        <div class="form-group">
                                            <label>مکان:</label>
                                            <select class="form-control" name="place">
                                                <option value=""></option>
                                                @foreach($cities as $city)

                                                    <option value="{{$city->place}}" >{{$city->place}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="hidden" value="" name="featured" #id="hfeatured">

                                    </div>
                                    <div class="col-sm-6">


                                        <div class="form-group" >
                                            <label>نوع معامله:</label>
                                            <select class="form-control" name="deal_type" id="deal">
                                                <option value=""></option>
                                                <option value="فروش">فروش</option>
                                                <option value="اجاره">اجاره</option>

                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label >نوع ملک:</label>
                                            <select class="form-control" name="type">
                                                <option selected="selected" value=""> </option>
                                                @foreach($types as $type)
                                                    <option  value="{{$type->type}}"> {{$type->type}} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>مساحت:</label>
                                            <select class="form-control" name="area">
                                                <option value="0"></option>
                                                @for($i=1;$i<30;$i=$i+2)
                                                    <option value="{{100*$i}}" >{{toFarsiDigits(100*$i)}}+</option>
                                                @endfor
                                            </select>
                                        </div>

                                    </div>

                                </div>
                                <div class="row hidden-sm">
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label class="buy">حداقل قیمت:</label>
                                            <select class="form-control buy" name="min_price" >
                                                <option selected="selected" value=""> </option>
                                                @for($i=1;$i<300;$i=$i+20)
                                                    <option value="{{50000*$i}}">{{toFarsiDigits(50000*$i)}} تومان</option>
                                                @endfor
                                            </select>
                                            <label class="rent" disabled="disabled" style="display: none">حداقل اجاره:</label>
                                            <select class="form-control rent" name="min_price"  disabled="disabled" style="display: none">
                                                <option selected="selected" value=""> </option>
                                                @for($i=1;$i<300;$i=$i+20)
                                                    <option value="{{100*$i}}">{{toFarsiDigits(100*$i)}} تومان</option>
                                                @endfor
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label class="buy">حداکثر قیمت:</label>
                                            <select class="form-control buy" name="max_price">
                                                <option selected="selected" value=""> </option>
                                                @for($i=1;$i<300;$i=$i+20)
                                                    <option value="{{50000*$i}}" >{{toFarsiDigits(50000*$i)}} تومان</option>
                                                @endfor
                                            </select>
                                            <label class="rent" disabled="disabled" style="display: none">حداکثر اجاره:</label>
                                            <select class="form-control rent" name="max_price" disabled="disabled" style="display: none">
                                                <option selected="selected" value=""> </option>
                                                @for($i=1;$i<300;$i=$i+20)
                                                    <option value="{{100*$i}}" >{{toFarsiDigits(100*$i)}} تومان</option>
                                                @endfor
                                            </select>
                                        </div>

                                    </div>

                                </div>


                            </div>
                            <div class="row">

                                <div class="col-sm-12 pull-left" style="margin-top: 10px;">
                                    <button class="btn btn-primary " type="submit" style="min-width: 90%;padding: 10px;margin-right: 15px">جستجو</button>

                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>

            </div>	</div>
        <div class="col-md-7 col-sm-7 col-xs-12 no_margin_left home_carousel pull-left">

            <!-- Start slideshow-carousel -->



            <div id="carousel-home" class="carousel slide" data-ride="carousel">

                <div class="showcase-arrow-next" href="#carousel-home" data-slide="next" style="display: block;"></div>
                <div class="showcase-arrow-previous" href="#carousel-home" data-slide="next" style="display: block;"></div>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{{asset($featureds[0]->image)}}" alt="">


                        <div class="carousel-caption" style="direction: rtl !important;;text-align: right">
                            <a href="{{route("single_property",["id"=>$featureds[0]->id])}}"><h4>{{$featureds[0]->title}}</h4>
                                <p>{{$featureds[0]->place}}</p></a>
                        </div>
                    </div>
                    @for($i=1;$i<count($featureds);$i++)
                    <div class="item ">
                        <img src="{{asset($featureds[$i]->image)}}" alt="">


                        <div class="carousel-caption" style="direction: rtl !important;;text-align: right">
                            <a href="{{route("single_property",["id"=>$featureds[$i]->id])}}"><h4>{{$featureds[$i]->title}}</h4>
                                <p>{{$featureds[$i]->place}}</p></a>
                        </div>
                    </div>
                    @endfor
                </div>

            </div>
            <!-- // end of slideshow-carousel -->

        </div>
    </div>
<div class="row">
    <div class="col-md-12" style="text-align: center;padding-bottom: 20px">
        <h2 style="font-family: IranSansWeb_Bold">آخرین املاک</h2>
    </div>
</div>
    @foreach($latests as $latest)
        <div class="col-xs-4" style="direction: rtl!important; text-align: center!important;float: right;">
            <h3 class="hidden-xs"> {{$latest->title}}</h3>
            <h3 class="visible-xs">{{$latest->title}}</h3>
            <a href="{{route("single_property",["id"=>$featureds[0]->id])}}"><img src="{{asset($latest->image)}}" style="min-width: 100%;max-height: 200px" alt="" /></a>
            {{str_limit($latest->description, 20)}}
        </div>
        @endforeach
    </div>

        <div class="row" style="margin-top: 30px">
            <div class="col-sm-8 col-sm-offset-2" style="text-align: center">
                <h3>در شبکه های اجتماعی ما را دنبال کنید:</h3>
                <a href="https://t.me/badabrestaurant" class="fa fa-telegram" style="color: #00AAE2;font-size: 50px;margin-left: 20px" aria-hidden="true"></a>
                <a href="https://www.instagram.com/badab.restaurant" class="fa fa-instagram" style="color: #f0005e;font-size: 50px;padding: 10px"></a>
                <a href="https://www.facebook.com/badabsort1/" class="fa fa-facebook-square" aria-hidden="true" style="color:#1c62b9;font-size: 50px"></a>
            </div>
        </div>

    {{--<div class="row">--}}
        {{--<br />--}}
        {{--<div class="col-sm-4 hidden-xs">--}}



            {{--<div id="home_map_canvas"></div>--}}



        {{--</div>--}}


    {{--</div>--}}
        <script>
            $(function () {
                $("#deal").change(function () {
                    if($(this).val()=="فروش"){
                        $(".buy").show();
                        $(".buy").attr("disabled", false);
                        $(".rent").hide();
                        $(".rent").attr("disabled", true);
                    }
                    else if ($(this).val()=="اجاره"){
                        $(".rent").show();
                        $(".rent").attr("disabled", false);
                        $(".buy").hide();
                        $(".buy").attr("disabled", true);
                    }
                });
            })();
        </script>
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

    </div> <!-- /container -->



@endsection
