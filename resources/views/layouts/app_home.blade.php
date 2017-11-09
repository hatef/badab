<!DOCTYPE html>
<html lang="en"  ng-app="minuut">
<head>
    @include("layouts.head")

    @include("layouts.styles")
        <!-- CORE CSS -->



        @include("layouts.scripts")

    @yield('header')
</head>
<body style="font-family: IranSansWeb !important; direction: rtl!important;">
<div class="container">

    @include("layouts.nav_home")
    @yield('content')


</div>
</body>
</html>
