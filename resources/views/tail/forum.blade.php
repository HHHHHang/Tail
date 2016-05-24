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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>数字良品-论坛</title>
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
            <a class="navbar-brand" href="/">     &nbsp;&nbsp;&nbsp;首页</a>
            <a class="navbar-brand" style="color: #57ADFD" href="/forum">     &nbsp;&nbsp;&nbsp;  社区</a>
            <a class="navbar-brand" href="#">     &nbsp;&nbsp;&nbsp;  二手广场</a>
            <a class="navbar-brand" href="/search/article">     &nbsp;&nbsp;&nbsp;  搜索</a>
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

<div class="container">
    <div class="row">
        <div class="forumLeftPart col-md-8">

            <div class="forumTypeDiv">
                <div class="checked"><a href="#"><span class="glyphicon glyphicon-inbox"></span><span>全部</span></a></div>
                <div><a href="#"><span class="glyphicon glyphicon-phone"></span><span>手机</span></a></div>
                <div><a href="#"><span class="glyphicon glyphicon-camera"></span><span>摄影</span></a></div>
                <div><a href="#"><span class="glyphicon glyphicon-floppy-open"></span><span>电脑</span></a></div>
                <div><a href="#"><span class="glyphicon glyphicon-phone"></span><span>平板</span></a></div>
                <div><a href="#"><span class="glyphicon glyphicon-bullhorn"></span><span>资讯</span></a></div>
                <div><a href="#"><span class="glyphicon glyphicon-facetime-video"></span><span>视频</span></a></div>
                <div><a href="#"><span class="glyphicon glyphicon-film"></span><span>影音</span></a></div>
                <div><a href="#"><span class="glyphicon glyphicon-facetime-video"></span><span>数码</span></a></div>
                <div><a href="#"><span class="glyphicon glyphicon-send"></span><span>周边</span></a></div>
                <div><a href="#"><span class="glyphicon glyphicon-home"></span><span>生活</span></a></div>
                <div><a href="#"><span class="glyphicon glyphicon-pencil"></span><span>文具</span></a></div>
                <div><a href="#"><span class="glyphicon glyphicon-console"></span><span>游戏</span></a></div>
            </div>
            <div class="forumTabDiv">
                <span class="checked"><a>全部帖子</a></span>
                <span><a>我的帖子</a></span>
                <span></span>
                <span><a>排序方式</a></span>
            </div>
            <div class="forumListDiv">
                @foreach ( $data as $item )
                    <div class="forumItemDiv">
                        <img width="50" height="50" src="{{ $item['icon'] }}"  class="forumItemPic img-circle img-responsive">

                        <div class="forumItemContent">
                            <div>
                                <a href="/forum/Detail">{{ $item['title'] }}</a>
                            </div>
                            <div class="forumItemContentInfo">
                                <span><a href="#">{{ $item['writer'] }}</a></span>
                                <span>类别 <a href="#">{{ $item['type'] }}</a></span>
                                <span>发表时间 {{ $item['publishTime'] }}</span>
                                <span><span class="glyphicon glyphicon-comment"></span>{{ $item['commentCount'] }}</span>
                            </div>

                        </div>
                    </div>
                @endforeach
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

            <div class="forumNewBtn">
                <button type="button" class="btn">发布帖子</button>
            </div>

            <div class="forumSearch well">
                <span>站内搜索</span>
                <form class="input-group" method="GET" role="form" action="/search/forum">
                    <input type="text" class="form-control" name="searchTar">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                </form>
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
