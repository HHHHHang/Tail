<!DOCTYPE html>
<html lang="en">
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NEW Template</title>

    <!-- jQuery -->
    <script src="{{asset('js/jquery.js')}}"></script>

    <script src="{{URL::asset('js/jquery.touchSwipe.min.js')}}"></script>
    <script src="{{URL::asset('js/imagesloaded.min.js')}}" ></script>

    {{--<script src="{{asset('js/slider.js')}}"></script>--}}

            <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >

    <!-- Custom CSS -->

    <link href="{{asset('css/blog-home.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('styles/simditor.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/new_artical.css') }}" rel="stylesheet" type="text/css">
    <script src="{{asset('scripts/jquery.min.js')}}"></script>
    <script src="{{asset('scripts/module.js')}}"></script>
    <script src="{{asset('scripts/hotkeys.js')}}"></script>
    <script src="{{asset('scripts/uploader.js')}}"></script>
    <script src="{{asset('scripts/simditor.js')}}"></script>
    <script src="{{asset('scripts/simditor-dropzone.js')}}"></script>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



</head>
<body>

    <!-- Navigation -->
    <nav style="background-color: #FFFFFF; border: 2px solid #f5f5f5;box-shadow: 0 1px 4px #ccc" class="navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img class="navbar-logo" src="http://7xq64h.com1.z0.glb.clouddn.com/logo.png">
                <a class="navbar-brand" style="color: #57ADFD" href="/">     &nbsp;&nbsp;&nbsp;首页</a>
                <a class="navbar-brand" href="/">     &nbsp;&nbsp;&nbsp;  社区</a>
                <a class="navbar-brand" href="#">     &nbsp;&nbsp;&nbsp;  二手广场</a>
                <a class="navbar-brand" href="#">     &nbsp;&nbsp;&nbsp;  其他</a>
                @if (isset($user))
                    <a class="navbar-brand"  style="margin-left: 250px" href="/myinfo?name={{ $user['name'] }}"> &nbsp;&nbsp;&nbsp;&nbsp;{{  $user['name'] }}</a>
                    <a class="navbar-brand"  href="/logout"> &nbsp;{{ '退出' }}</a>
                @endif
                @if (!isset($user))
                    <a class="navbar-brand" style="margin-left: 250px" href="/login">     &nbsp;&nbsp;&nbsp;  登陆</a>
                    <a class="navbar-brand" href="/login">     &nbsp;&nbsp;&nbsp;  注册</a>
                @endif
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!--<form action="/frank" method="get"></form>-->




    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div>

            <div class="col-md-10">

              <!--  <a class="z_title" href="/frank" >尾巴主板</a>  -->

                <textarea name="content" id="editor" placeholder="Balabala" autofocus></textarea>

            </div>
        </div>
    </div>
    <button type="submit" >发表帖子</button>









    <footer>

    </footer>


   <script>
       var editor = new Simditor({
           textarea: $('#editor'),
           //optional options
           upload: {  url: '',
               params: null,
               fileKey: 'upload_file',
               connectionCount: 3,
               leaveConfirm: 'Uploading is in progress, are you sure to leave this page?'

           },
           defaultImage:null,
           pasteImage:true,
           toolbarHidden:false

       });
       editor.uploader.on("uploadcomplete", function(e, file, result){
           Pace.stop();
           $.unblockUI();
       });
   </script>





</body>
</html>