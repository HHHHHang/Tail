

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- jQuery -->
    <script src="{{URL::asset('js/jquery.js')}}"></script>

    <script src="{{asset('js/jquery.touchSwipe.min.js')}}"></script>
    <script src="{{asset('js/imagesloaded.min.js')}}" ></script>
    <!-- jQuery Sangar Slider -->
    <script src="{{asset('js/sangarSlider/sangarBaseClass.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarSetupLayout.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarSizeAndScale.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarShift.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarSetupBulletNav.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarSetupNavigation.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarSetupSwipeTouch.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarSetupTimer.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarBeforeAfter.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarLock.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarResponsiveClass.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarResetSlider.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarTextbox.js')}}"></script>
    <script src="{{asset('js/sangarSlider.js')}}"></script>
    {{--<script src="{{asset('js/slider.js')}}"></script>--}}

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/search.js')}}"></script>


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/bootstrap/style.css') }}" rel="stylesheet" type="text/css" >

    <!-- sangarSlider Sangar Slider -->
    <link href="{{ asset('css/sangarSlider/normalize.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/sangarSlider/default.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/sangarSlider/sangarSlider.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/sangarSlider/sangarSliderDefault.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/sangarSlider/responsive.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="{{URL::asset('css/navigation.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/sidebar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/blog-home.css')}}" rel="stylesheet" type="text/css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

