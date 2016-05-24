<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- jQuery -->
    <script src="{{URL::asset('js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >

    <!-- Custom CSS -->
    <link href="{{URL::asset('css/forum-home.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/search.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>数字良品-搜索</title>
</head>

<body style="background-color: #f5f5f5;">

<!-- Navigation -->
<nav style="background-color: #FFFFFF; border: 2px solid #f5f5f5;box-shadow: 0 1px 4px #ccc" class="navbar navbar-fixed-top custom_navbar" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/"><img class="navbar-logo" src="http://7xq64h.com1.z0.glb.clouddn.com/logo.png"></a>
            <a class="navbar-brand custom_navbar-brand" href="/">     &nbsp;&nbsp;&nbsp;首页</a>
            <a class="navbar-brand custom_navbar-brand" href="/forum">     &nbsp;&nbsp;&nbsp;  社区</a>
            <a class="navbar-brand custom_navbar-brand" href="#">     &nbsp;&nbsp;&nbsp;  二手广场</a>
            <a class="navbar-brand custom_navbar-brand" style="color: #57ADFD"  href="/search/article">     &nbsp;&nbsp;&nbsp;  搜索</a>
            @if (isset($user))
                <a class="navbar-brand custom_navbar-brand"  style="margin-left: 250px" href="/myinfo?name={{ $user['name'] }}"> &nbsp;&nbsp;&nbsp;&nbsp;{{  $user['name'] }}</a>
                <a class="navbar-brand custom_navbar-brand"  href="/logout"> &nbsp;{{ '退出' }}</a>
            @endif
            @if (!isset($user))
                <a class="navbar-brand custom_navbar-brand" style="margin-left: 250px" href="/login">     &nbsp;&nbsp;&nbsp;  登陆</a>
                <a class="navbar-brand custom_navbar-brand" href="/login">     &nbsp;&nbsp;&nbsp;  注册</a>
            @endif
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container">
    <div class="row">
        <div class="forumLeftPart col-md-8">

            <div class="forumSearch well">
                <span>站内搜索</span>
                <div class="input-group">
                    <input type="text" class="form-control" value="{{$searchTar}}">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                </div>
            </div>

            <div class="forumTabDiv">
                <span class="checked"><a href="/search/article">精选文章</a></span>
                <span><a href="/search/forum">帖子</a></span>
                <span><a>用户</a></span>
                <span></span>
                <span><a>排序方式</a></span>
            </div>
            <div class="forumListDiv">
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
                    <div class="postHead"><a href="/article" class="title-phone">深夜俱乐部 | 晒晒你喜欢的那款播放器</a></div>
                    <div class="postContent"><p class="content-phone">  音乐可能是每一个人打发闲暇时光的选择之一，好的音乐触动着我们内心那些细微的情感，也牵连着我们那些感性的思绪。体现一首好音乐的最佳表现不仅仅只靠一副不错...</p></div>
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
                    <div class="postHead"><a href="#" class="title-phone">溢于「颜」表，华为 G9 青春版体验</a></div>
                    <div class="postContent"><p class="content-phone">  主打中端市场的华为 G 系列在 5 月 4 日迎来了旗下新成员 — 华为 G9 青春版，该款新机虽以 G 字母为开头，但却更为像是华为 P9 的衍生机型（实际上就是华为在国...</p></div>
                    <a style="margin-left: 550px" href="#"><span class="glyphicon glyphicon-thumbs-up" style="color: #B0B4B7; font-size:20px;">&nbsp;9&nbsp;</span></a>
                    <a href="#"><span class="glyphicon glyphicon-comment" style="color: #B0B4B7; font-size:20px;">&nbsp;42</span></a>
                </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
        </div>
        <div class="forumRightPart col-md-4">

            <div class="well forumUserInfo">
                <div>
                    <img width="90" height="90" src="{{ $user1['icon'] }}"  class="img-responsive">
                    <span>{{ $user1['level'] }}</span>
                </div>

                <div>
                    <span>{{$user1['name']}}</span>
                    <div>
                        <a><span>{{ $user1['forumCount'] }}</span><span>帖子</span></a>
                        <a><span>{{ $user1['commentCount'] }}</span><span>评论</span></a>
                        <a><span>{{ $user1['followCount'] }}</span><span>关注</span></a>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

<footer>
    <div>
        <span>美好生活 从分享开始</span>
        <span>联系我们: xxx-xxxxxxx</span>
        <span>专业综合 组7</span>
        <span>同济大学 软件学院</span>
    </div>
</footer>
</body>

</html>
