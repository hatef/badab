
<?php $el=0;?>
@extends('layouts.app_home')

@section('content')



    <div class="row pull-right">
        <div class="col-sm-12  well" id="criteria" class="collapse">

            <div class="row" style="direction: rtl !important;">
                <form class="form-vertical" method="get" action="">
                    <fieldset>
                        <div class="col-sm-12" style="direction: rtl !important;text-align: right !important;">



                            <div class="row">
                                <div class="col-sm-6" >
                                    <div class="form-group">
                                        <label>مکان:</label>
                                        <select class="form-control" name="place">
                                            <option value=""></option>
                                            @foreach($cities as $city)

                                            <option value="{{$city->place}}" {{selected($inputs["place"],$city->place)}}>{{$city->place}}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                </div>
                                <div class="col-sm-6">


                                    <div class="form-group" >
                                        <label>نوع معامله:</label>
                                        <select class="form-control" name="deal_type" id="deal">
                                            <option value=""></option>
                                            <option value="فروش" {{selected($inputs["deal_type"],"فروش")}}>فروش</option>
                                            <option value="اجاره" {{selected($inputs["deal_type"],"اجاره")}}>اجاره</option>

                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label >نوع ملک:</label>
                                        <select class="form-control" name="type">
                                            <option  value=""> </option>
                                           @foreach($types as $typee)
                                                <option  value="{{$typee->type}}" {{selected($inputs["type"],$typee->type)}}> {{$typee->type}} </option>
                                           @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>مساحت: </label>
                                        <select class="form-control" name="area">
                                            <option value="0"></option>
                                            <option value="{{($inputs["min_area"])}}" {{selected($inputs["area"],$inputs["min_area"])}}>{{toFarsiDigits($inputs["min_area"])}} +</option>

                                            @for($i=0;$i<10;$i++)
                {{$el+=($inputs["max_area"])}}
                                            <option value="{{($inputs["min_area"]+$i)}}" {{selected($inputs["area"],$inputs["min_area"]+($inputs["max_area"]/100))}}>{{toFarsiDigits($el)}} +</option>
                                            @endfor
                                        </select>
                                    </div>

                                </div>

                            </div>
                            <div class="row hidden-sm">
                                <div class="col-sm-6">

                                    <div class="form-group">

                                        @if(!$inputs["deal_type"])
                                            <label class="buy" >حداقل قیمت:</label>
                                            <select class="form-control buy" name="min_price" >
                                                <option></option>
                                                @for($i=1;$i<300;$i=$i+20)
                                                    <option value="{{50000*$i}}" {{selected($inputs["min_price"],50000*$i)}}>{{toFarsiDigits(50000*$i)}} تومان</option>
                                                @endfor
                                            </select>
                                        @endif
                                        <label class="buy" {{disable($inputs["deal_type"],"اجاره")}} style="display: {{hide($inputs["deal_type"],"اجاره")}}">حداقل قیمت:</label>
                                        <select class="form-control buy" name="min_price" class="buy" {{disable($inputs["deal_type"],"اجاره")}} style="display: {{hide($inputs["deal_type"],"اجاره")}}">
                                            <option></option>
                                            @for($i=1;$i<300;$i=$i+20)
                                                <option value="{{50000*$i}}" {{selected($inputs["min_price"],50000*$i)}}>{{toFarsiDigits(50000*$i)}} تومان</option>
                                            @endfor
                                            </select>
                                        <label class="rent" {{disable($inputs["deal_type"],"فروش")}} style="display: {{hide($inputs["deal_type"],"فروش")}}">حداقل اجاره:</label>
                                        <select class="form-control rent" name="min_price"  {{disable($inputs["deal_type"],"فروش")}} style="display: {{hide($inputs["deal_type"],"فروش")}}">
                                            <option></option>
                                            @for($i=1;$i<300;$i=$i+20)
                                                <option value="{{100*$i}}" {{selected($inputs["min_price"],100*$i)}}>{{toFarsiDigits(100*$i)}} تومان</option>
                                            @endfor
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">


                                        @if(!$inputs["deal_type"])
                                            <label class="buy" >حداقل قیمت:</label>
                                            <select class="form-control buy" name="max_price">
                                                <option></option>
                                                @for($i=1;$i<300;$i=$i+20)
                                                    <option value="{{50000*$i}}" {{selected($inputs["min_price"],50000*$i)}}>{{toFarsiDigits(50000*$i)}} تومان</option>
                                                @endfor
                                            </select>
                                        @endif


                                        <label class="buy" {{disable($inputs["deal_type"],"اجاره")}} style="display: {{hide($inputs["deal_type"],"اجاره")}}">حداکثر قیمت:</label>
                                        <select class="form-control buy" name="max_price" class="buy" {{disable($inputs["deal_type"],"اجاره")}} style="display: {{hide($inputs["deal_type"],"اجاره")}}">
                                            <option></option>
                                            @for($i=1;$i<300;$i=$i+20)
                                                <option value="{{50000*$i}}" {{selected($inputs["max_price"],50000*$i)}}>{{toFarsiDigits(50000*$i)}} تومان</option>
                                            @endfor
                                        </select>
                                        <label class="rent" {{disable($inputs["deal_type"],"فروش")}} style="display: {{hide($inputs["deal_type"],"فروش")}}">حداکثر اجاره:</label>
                                        <select class="form-control rent" name="max_price"  {{disable($inputs["deal_type"],"فروش")}} style="display: {{hide($inputs["deal_type"],"فروش")}}">
                                            <option></option>
                                            @for($i=1;$i<300;$i=$i+20)
                                                <option value="{{100*$i}}" {{selected($inputs["max_price"],100*$i)}}>{{toFarsiDigits(100*$i)}} تومان</option>
                                            @endfor
                                        </select>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12 " style="margin-top: 10px;">

                                <input type="hidden" value="" name="featured" #id="hfeatured">


                                <button class="btn btn-primary " type="submit" style="min-width: 90%;padding: 10px;margin-right: 15px">جستجو</button>

                            </div>
                        </div>

                    </fieldset>

            </div>
        </div>
    </div>

    <div class="col-sm-8">





        <br />
   @foreach($properties as $property)
            <div class="row premium">
                <div class="col-sm-3 col-xs-3">
                    <a href="{{route("single_property",["id"=>$property->id])}}" class="thumbnail " ><img alt="" src="{{asset($property->image)}}"></a>

                   @if($property->featured=="on")
                        <div class="badger-outter" id="Badger"><div class="badger-inner"><p class="badger-badge badger-text" id="Badge">ویژه</p></div></div>
                   @endif
                    <h5>
     <small>
                        قیمت:
     </small>
                        {{toFarsiDigits($property->price)}}

                    </h5>
                    <h6>
                        <small>
                        مساحت:
                        </small>

                        {{$property->area}} متر</h6>
                    <h6>
        <small>
                        نوع ملک:
        </small>



                        {{$property->type}}</h6>
                    <h6>
            <small>
                        نوع معامله:
            </small>
                        {{$property->deal_type}}</h6>
                    <h6>

      <small>
                        مکان:
      </small>
                        {{$property->place}}</h6>
                </div>

                <div class="col-sm-9"><h3><a href="{{route("single_property",["id"=>$property->id])}}" style="color: #0b0b0b">{{$property->title}}</a>


                    </h3>

                    <p>
                        {{$property->description}}                    </p>
                    @if(!Auth::guest())
                        @if(Auth::user()->role=="ROLE_ADMIN")
                            <div class="form-group has-feedback"></div>
                            <small><a href="{{route("modify_property")}}?id={{$property->id}}" class="btn btn-warning">ویرایش</a> </small>
                            <small><a href="{{route("remove_property")}}?id={{$property->id}}" class="btn btn-danger">حذف</a> </small>


                            @if($property->featured=="off")
                                <small><a href="{{route("promote_property",["id"=>$property->id,"val"=>"on"])}}" class="btn btn-success">ارتقا</a> </small>
                            @else
                                <small><a href="{{route("promote_property",["id"=>$property->id,"val"=>"off"])}}" class="btn btn-info">تنزل</a> </small>
                            @endif
                        @if($property->status=="pending")
                            <small><a href="{{route("approve_property",["id"=>$property->id])}}" class="btn btn-primary">تایید</a> </small>
                        @endif


                        @endif
                    @endif
                </div>
            </div>
            <hr />

        @endforeach











        <div class="row">
            <div class="col-sm-3" style="padding-top: 25px">
                صفحات:
            </div><div class="col-sm-9">
                <ul class="pagination" style="text-align: center">
                    @for($i=0;$i<$pages;$i++)

                        <button type="submit" value="{{$i+1}}" name="p"  class="btn btn-default">{{toFarsiDigits($i+1)}}</button>

                 @endfor
                    </form>
                </ul>
            </div>
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
@endsection