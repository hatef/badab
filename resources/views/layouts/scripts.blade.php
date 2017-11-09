<!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script type="text/javascript" src="{{asset('js/jquery-3.2.0.js')}}"></script>


<script src="{{asset('js/site.js')}}"></script>



<script type="text/javascript" src="{{asset('rjs/response.min.js')}}"></script>

<!-- Important Owl stylesheet -->


<!-- Default Theme -->
<link rel="stylesheet" href="{{asset("rjs/owl-carousel/owl.theme.css")}}">

<!-- Include js plugin -->
<script src="{{asset('rjs/owl-carousel/owl.carousel.js')}}"></script>

<script type="text/javascript" src="{{asset('rjs/jquery.aw-showcase/jquery.aw-showcase.js')}}"></script>



<script type="text/javascript" src="{{asset('rjs/badger/badger.min.js')}}"></script>


<script type="text/javascript" src="{{asset('rjs/sticky/sticky.min.js')}}"></script>

<script type="text/javascript" src="{{asset('rjs/portamento-min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

{{--<script src='https://www.google.com/recaptcha/api.js'></script>--}}