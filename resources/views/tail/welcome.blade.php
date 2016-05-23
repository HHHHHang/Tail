<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >

    <!-- sangarSlider Sangar Slider -->
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/default.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/sangarSlider.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/default.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/sangarSliderDefault.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="{{URL::asset('css/blog-home.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-color: #f5f5f5;">

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

    <!-- Slider -->
    <div class="htmleaf-container">

        <div class="htmleaf-content bgcolor-13">
            <div class='sangar-slideshow-container' id='sangar-example'>
                <div class='sangar-content-wrapper' style='display:none; height:580px;'>
                    <div class='sangar-content'><a href="/article"></a><img src='http://s.dgtle.com/portal/201605/20/210446ovppnnvbljyb0x22.jpg?szhdl=imageview/2/w/1200' /></div>
                    <div class='sangar-content'><a href="/article"></a><img src='http://s.dgtle.com/portal/201605/20/175632kexko4k8yj6o9xik.jpg?szhdl=imageview/2/w/1200' /></div>
                    <div class='sangar-content'><a href="/article"></a><img src='http://s.dgtle.com/portal/201605/17/140154xv4ztjv67y72vbqb.jpg?szhdl=imageview/2/w/1200' /></div>
                    <div class='sangar-content'><a href="/article"></a><img src='http://s.dgtle.com/portal/201605/19/104358kimi38ti5z9m7s89.jpg?szhdl=imageview/2/w/1200' /></div>
                    <div class='sangar-content'><a href="/article"></a><img src='http://s.dgtle.com/portal/201605/19/113602kwwyh0m8x9o7z0os.png?szhdl=imageview/2/w/1200' /></div>
                    <div class='sangar-content'><a href="/article"></a><img src='http://s.dgtle.com/portal/201605/17/173346wssczbbeqycccehs.jpg?szhdl=imageview/2/w/1200' /></div>
                    <div class='sangar-content'><a href="/article"></a><img src='http://s.dgtle.com/portal/201605/13/111824g8r1td8vgttrr1cq.jpg?szhdl=imageview/2/w/1200' /></div>
                    <div class='sangar-content'><a href="/article"></a><img src='http://s.dgtle.com/portal/201605/12/144107nowz1u1uu318lldo.jpg?szhdl=imageview/2/w/1200' /></div>
                </div>
            </div>
        </div>

    </div>

    <div class="container">

                <h1 class="page-header">
                    <small>尾巴体验</small>
                </h1>

        </div>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    <small>最新文章</small>
                </h1>

                <!-- First Blog Post -->
                <div class="well">
                <div>
                <img style="float: left" width="50" height="50" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png"   class="img-rounded img-circle img-responsive">
                <p class="tie-head">&nbsp;&nbsp;测试用户</p>
                <span><a href="#">&nbsp;&nbsp;<span class="glyphicon glyphicon-film" style="color: rgb(108, 118, 127); font-size: 12px;">影音</span></a></span>

                </div>
                <p class="postTime"><span class="glyphicon glyphicon-time"></span> &nbsp;昨天</p>
                <hr>
                <img class="img-responsive" src="http://7xq64h.com1.z0.glb.clouddn.com/nano.jpg" alt="">
                <hr>
                <a href="/article" class="title-phone">深夜俱乐部 | 晒晒你喜欢的那款播放器</a>
                <p class="content-phone">音乐可能是每一个人打发闲暇时光的选择之一，好的音乐触动着我们内心那些细微的情感，也牵连着我们那些感性的思绪。体现一首好音乐的最佳表现不仅仅只靠一副不错...</p>
                <a style="margin-left: 550px" href="#"><span class="glyphicon glyphicon-thumbs-up" style="color: #B0B4B7; font-size:20px;">&nbsp;3&nbsp;</span></a>
                <a href="#"><span class="glyphicon glyphicon-comment" style="color: #B0B4B7; font-size:20px;">&nbsp;3</span></a>
                </div>

                <!-- Second Blog Post -->
                <div class="well">
                <div>
                <img style="float: left" width="50" height="50" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png"   class="img-rounded img-circle img-responsive">
                <p class="tie-head">&nbsp;&nbsp;测试用户</p>
                <span><a href="#">&nbsp;&nbsp;<span class="glyphicon glyphicon-phone" style="color: rgb(108, 118, 127); font-size: 12px;">手机</span></a></span>
                </div>
                <p class="postTime"><span class="glyphicon glyphicon-time"></span> &nbsp;昨天</p>
                <hr>
                <img class="img-responsive" src="http://7xq64h.com1.z0.glb.clouddn.com/phone.jpg" alt="">
                <hr>
                <a href="#" class="title-phone">溢于「颜」表，华为 G9 青春版体验</a>
                <p class="content-phone">主打中端市场的华为 G 系列在 5 月 4 日迎来了旗下新成员 — 华为 G9 青春版，该款新机虽以 G 字母为开头，但却更为像是华为 P9 的衍生机型（实际上就是华为在国...</p>
                <a style="margin-left: 550px" href="#"><span class="glyphicon glyphicon-thumbs-up" style="color: #B0B4B7; font-size:20px;">&nbsp;9&nbsp;</span></a>
                <a href="#"><span class="glyphicon glyphicon-comment" style="color: #B0B4B7; font-size:20px;">&nbsp;42</span></a>
                </div>
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>站内搜索</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4 style="color: rgb(108, 118, 127);">频道分类</h4>
                    <div class="row">
                        <div class="col-xs-4 col-md-4">
                            <ul class="list-unstyled">
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-phone" style="color: rgb(108, 118, 127); font-size: 17px;"> 手机</span></a>
                                </li>
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-floppy-open" style="color: rgb(108, 118, 127); font-size: 17px;"> 电脑</span></a>
                                </li>
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-bullhorn" style="color: rgb(108, 118, 127); font-size: 17px;"> 资讯</span></a>
                                </li>
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-facetime-video" style="color: rgb(108, 118, 127); font-size: 17px;"> 视频</span></a>
                                </li>
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-send" style="color: rgb(108, 118, 127); font-size: 17px;"> 周边</span></a>
                                </li>
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-phone" style="color: rgb(108, 118, 127); font-size: 17px;"> 平板</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-xs-4 col-md-4">
                            <ul class="list-unstyled">
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-camera" style="color: rgb(108, 118, 127); font-size: 17px;"> 摄影</span></a>
                                </li>
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-film" style="color: rgb(108, 118, 127); font-size: 17px;"> 影音</span></a>
                                </li>
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-facetime-video" style="color: rgb(108, 118, 127); font-size: 17px;"> 数码</span></a>
                                </li>
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-plane" style="color: rgb(108, 118, 127); font-size: 17px;"> 旅行</span></a>
                                </li>
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-home" style="color: rgb(108, 118, 127); font-size: 17px;"> 生活</span></a>
                                </li>
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-pencil" style="color: rgb(108, 118, 127); font-size: 17px;"> 文具</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <ul class="list-unstyled">
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-heart" style="color: rgb(108, 118, 127); font-size: 17px;"> 玩物</span></a>
                                </li>
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-console" style="color: rgb(108, 118, 127); font-size: 17px;"> 游戏</span></a>
                                </li>
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-blackboard" style="color: rgb(108, 118, 127); font-size: 17px;"> 应用</span></a>
                                </li>
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-education" style="color: rgb(108, 118, 127); font-size: 17px;"> 沙龙</span></a>
                                </li>
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-hourglass" style="color: rgb(108, 118, 127); font-size: 17px;"> 活动</span></a>
                                </li>
                                <li>
                                <a href="#"><span class="glyphicon glyphicon-inbox" style="color: rgb(108, 118, 127); font-size: 17px;"> 全部</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <img width="360px" height="160px" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-05-19%20%E4%B8%8A%E5%8D%882.55.36.png" />
                <br>
                <br>
                <br>

                <img width="360px" height="400px" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-05-19%20%E4%B8%8A%E5%8D%882.55.48.png"/>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <script type='text/javascript'>
        jQuery(document).ready(function($) {
            /**
             * identifier variable must be unique ID
             */
            var sangar = $('#sangar-example').sangarSlider({
                timer :  true, // true or false to have the timer
                pagination : 'content-horizontal', // bullet, content, none
                paginationContent : ["http://s.dgtle.com/portal/201605/20/210446ovppnnvbljyb0x22.jpg?szhdl=imageview/2/w/1200", "http://s.dgtle.com/portal/201605/20/175632kexko4k8yj6o9xik.jpg?szhdl=imageview/2/w/1200", "http://s.dgtle.com/portal/201605/17/140154xv4ztjv67y72vbqb.jpg?szhdl=imageview/2/w/1200", "http://s.dgtle.com/portal/201605/19/104358kimi38ti5z9m7s89.jpg?szhdl=imageview/2/w/1200","http://s.dgtle.com/portal/201605/19/113602kwwyh0m8x9o7z0os.png?szhdl=imageview/2/w/1200" ,"http://s.dgtle.com/portal/201605/17/173346wssczbbeqycccehs.jpg?szhdl=imageview/2/w/1200","http://s.dgtle.com/portal/201605/13/111824g8r1td8vgttrr1cq.jpg?szhdl=imageview/2/w/1200s","http://s.dgtle.com/portal/201605/12/144107nowz1u1uu318lldo.jpg?szhdl=imageview/2/w/1200"], // can be text, image, or something
                paginationContentType : 'image', // text, image
                paginationContentWidth : 150, // pagination content width in pixel
                paginationImageHeight : 110, // pagination image height
                width : 1200, // slideshow width
                height : 420, // slideshow height
                fixedHeight: true,
                scaleSlide : false // slider will scale to the container size
            });
        })
    </script>
</body>

</html>
