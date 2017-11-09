<div class="row"><!-- start header -->
    <div class="col-sm-5 col-xs-6 logo">
            <div class="row">
                <div class="col-sm-3 hidden-xs logo-img">
                    <a href="{{route("home")}}"> <img src="{{asset('rcss/images/Home-green-48.png')}}" alt=""/></a>
                </div>
                <div class="col-sm-9 logo-text">
                    <a href="{{route("home")}}" style="color: #0b0b0b;text-decoration: none"> <h3>مشاور املاک چاردانگه</h3></a>
                </div>
            </div>
    </div>
    <div class="col-sm-4 col-xs-6 customer_service pull-right text-right">
        <h4 class="phone"><span class="hidden-xs">شماره تماس: </span>۰۹۱۱۳۰۷۳۰۰۵</h4>
        <h4><small>حسن ابن عباس</small></h4>
    </div>
</div><!-- end header -->
<div class="row"><!-- start nav -->
    <div class="col-sm-12">

        <nav class="navbar navbar-inverse" role="navigation" >
            <div class="navbar-inner">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand visible-xs" href="#">منو</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        @if(!Auth::guest())
                            @if(Auth::user()->role=="ROLE_ADMIN")


                                <li>     <a  href="{{ url('/logout') }}"
                                             onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                        خروج
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>

                       @endif
                        @endif
                            <li><a href="{{ route('add_property') }}">ایجاد ملک</a></li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right" style="direction: rtl !important; text-align: right !important;">
                        @if(isset($sections))
                                <li><a href="{{route("home")}}" class="{{$sections["home"]}}">خانه</a></li>

                                <li><a href="{{route("listing",["sect"=>"index"])}}" class="{{$sections["index"]}}">املاک</a></li>
                            <li><a href="{{route("listing",["sect"=>"sales"])}}?deal_type=فروش" class="{{$sections["sales"]}}">برای فروش</a></li>
                            <li><a href="{{route("listing",["sect"=>"rentals"])}}?deal_type=اجاره" class={{$sections["rentals"]}}>برای اجاره</a></li>
                            <li><a href="{{route("listing",["sect"=>"featureds"])}}?featured=on" class={{$sections["featureds"]}}>ویژه ها</a></li>
                            <li><a href="{{route("contact")}}" class={{$sections["contact"]}}>تماس با ما</a></li>
                            @else
                            <li><a href="{{route("home")}}" >خانه</a></li>

                            <li><a href="{{route("listing",["sect"=>"index"])}}" >املاک</a></li>
                            <li><a href="{{route("listing",["sect"=>"sales"])}}?deal_type=فروش" >برای فروش</a></li>
                            <li><a href="{{route("listing",["sect"=>"rentals"])}}?deal_type=اجاره" >برای اجاره</a></li>
                            <li><a href="{{route("listing",["sect"=>"featureds"])}}?featured=on" >ویژه ها</a></li>
                            <li><a href="{{route("contact")}}" >تماس با ما</a></li>
                        @endif









                    </ul>

                </div><!-- /.navbar-collapse -->
            </div>
        </nav>

    </div>
</div>
