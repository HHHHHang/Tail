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

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >


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
                {{--<img class="img-responsive" src="http://7xq64h.com1.z0.glb.clouddn.com/nano.jpg" alt="">--}}
                <hr>
                <p style="text-align:center" href="#" class="title-phone">深夜俱乐部 | 晒晒你喜欢的那款播放器</p>
                <hr>
                <p class="content-nano">音乐可能是每一个人打发闲暇时光的选择之一，好的音乐触动着我们内心那些细微的情感，也牵连着我们那些感性的思绪。体现一首好音乐的最佳表现不仅仅只靠一副不错的耳机就行，适合自己的播放器也同样重要，这里的播放器可以是手机、音频播放器或者录音笔，只要是你喜欢的就欢迎晒出来。今晚深夜俱乐部我们就来聊一聊自己喜欢的那款播放器吧。</p>
                <br>
                <p class="content-nano">
                @小淼-海：要说播放器我用过的其实蛮多，喜欢的也蛮多，就说一下近期较为钟意的那款吧。前段时间用了一下 iBasso DX80，其清澈干净的声音十分吸引我，听感上不会十分刺激，温和平淡的底子十分耐听，对于每天有很多东西听的我来说再合适不过了。
                </p>
                <img class="img-responsive" src="http://7xq64h.com1.z0.glb.clouddn.com/nano.jpg" alt="">
                <p class="content-nano">
                @罗莱尔特：我最喜欢的播放器可能是手上的手机了，反正我平时带它的次数比带女朋友的次数还多，能够在线收听音乐也是一个强项。当然了，论音质的话，肯定还是专业的播放器好。
                </p>
                <a style="margin-left: 550px" href="#"><span class="glyphicon glyphicon-thumbs-up" style="color: #B0B4B7; font-size:20px;">&nbsp;3&nbsp;</span></a>
                <a href="#"><span class="glyphicon glyphicon-comment" style="color: #B0B4B7; font-size:20px;">&nbsp;3</span></a>
                </div>

                <div class="well">
                    <h4>评论:</h4>
                    <form method="POST" role="form" action="/article">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">评论</button>
                    </form>
                <hr>

                @foreach ($comments as $comment)
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" width="64" height="64" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $comment->username }}
                            <small>{{ date('Y-m-d H:i:s', $comment->createtime)   }}</small>
                        </h4>
                        {{ $comment->content  }}
                    </div>
                </div>

                <!-- Comment -->
                @endforeach
                </div>
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
                <div class="well">
                    <h4 style="color: #898989">作者其他文章</h4>
                    <hr>
                    <p><a href="#" class="content-other">中端新「血液」，HTC Desire 830 / 825 正式亮相</a></p>
                    <p><a href="#" class="content-other">溢于「颜」表，华为 G9 青春版体验</a></p>
                    <p><a href="#" class="content-other">尾巴女孩 | 许久不见，那些年的你</a></p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="well">
                    <h4 style="color: #898989">作者信息</h4>
                    <hr>
                    <div class="row">
                        <image width="250" height="130" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-05-19%20%E4%B8%8A%E5%8D%881.14.18.png"></image>
                        <!-- /.col-lg-6 -->
                        <h1 style="text-align: center; font-size: 16px"> 测试用户 </h1>
                        <hr>
                        <div style="font-size: 16px; text-align: center">0 关注 &nbsp;&nbsp; 0 粉丝 &nbsp;&nbsp;  0 帖子</div>
                    </div>
                </div>
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


</body>

</html>
