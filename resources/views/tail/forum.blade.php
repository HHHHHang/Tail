
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- jQuery -->
    <script src="http://115.28.180.158:84/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://115.28.180.158:84/js/bootstrap.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="http://115.28.180.158:84/css/bootstrap.css" rel="stylesheet" type="text/css" >
    <link href="http://115.28.180.158:84/css/style.css" rel="stylesheet" type="text/css" >

    <!-- Custom CSS -->
    <link href="http://115.28.180.158:84/css/forum-home.css" rel="stylesheet" type="text/css" />

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
            <a class="navbar-brand custom_navbar-brand" style="color: #57ADFD" href="/forum">     &nbsp;&nbsp;&nbsp;  社区</a>
            <a class="navbar-brand custom_navbar-brand" href="#">     &nbsp;&nbsp;&nbsp;  二手广场</a>
            <a class="navbar-brand custom_navbar-brand" href="/search/article">     &nbsp;&nbsp;&nbsp;  搜索</a>
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
                <div class="forumItemDiv">
                    <img width="50" height="50" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png"  class="forumItemPic img-circle img-responsive">

                    <div class="forumItemContent">
                        <div>
                            <a href="/forum/Detail">深夜俱乐部 | 晒晒你喜欢的那款播放器</a>
                        </div>
                        <div class="forumItemContentInfo">
                            <span><a href="#">测试用户</a></span>
                            <span>类别 <a href="#">影音</a></span>
                            <span>发表时间 昨天</span>
                            <span><span class="glyphicon glyphicon-comment"></span>1</span>
                        </div>

                    </div>
                </div>
                <div class="forumItemDiv">
                    <img width="50" height="50" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png"  class="forumItemPic img-circle img-responsive">

                    <div class="forumItemContent">
                        <div>
                            <a href="/forum/Detail">深夜俱乐部 | 晒晒你喜欢的那款播放器晒晒你喜欢的那款播放器</a>
                        </div>
                        <div class="forumItemContentInfo">
                            <span><a href="#">测试用户</a></span>
                            <span>类别 <a href="#">影音</a></span>
                            <span>发表时间 昨天</span>
                            <span><span class="glyphicon glyphicon-comment"></span>2</span>
                        </div>

                    </div>
                </div>
                <div class="forumItemDiv">
                    <img width="50" height="50" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png"  class="forumItemPic img-circle img-responsive">

                    <div class="forumItemContent">
                        <div>
                            <a href="/forum/Detail">深夜俱乐部 | 晒晒你喜欢的那款播放器</a>
                        </div>
                        <div class="forumItemContentInfo">
                            <span><a href="#">测试用户</a></span>
                            <span>类别 <a href="#">影音</a></span>
                            <span>发表时间 昨天</span>
                            <span><span class="glyphicon glyphicon-comment"></span>3</span>
                        </div>

                    </div>
                </div>
                <div class="forumItemDiv">
                    <img width="50" height="50" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png"  class="forumItemPic img-circle img-responsive">

                    <div class="forumItemContent">
                        <div>
                            <a href="/forum/Detail">深夜俱乐部 | 晒晒你喜欢的那款播放器</a>
                        </div>
                        <div class="forumItemContentInfo">
                            <span><a href="#">测试用户</a></span>
                            <span>类别 <a href="#">影音</a></span>
                            <span>发表时间 昨天</span>
                            <span><span class="glyphicon glyphicon-comment"></span>4</span>
                        </div>

                    </div>
                </div>
                <div class="forumItemDiv">
                    <img width="50" height="50" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png"  class="forumItemPic img-circle img-responsive">

                    <div class="forumItemContent">
                        <div>
                            <a href="/forum/Detail">深夜俱乐部 | 晒晒你喜欢的那款播放器晒晒你喜欢的那款播放器晒晒你喜欢的那款播放器</a>
                        </div>
                        <div class="forumItemContentInfo">
                            <span><a href="#">测试用户</a></span>
                            <span>类别 <a href="#">影音</a></span>
                            <span>发表时间 昨天</span>
                            <span><span class="glyphicon glyphicon-comment"></span>5</span>
                        </div>

                    </div>
                </div>
                <div class="forumItemDiv">
                    <img width="50" height="50" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png"  class="forumItemPic img-circle img-responsive">

                    <div class="forumItemContent">
                        <div>
                            <a href="/forum/Detail">深夜俱乐部 | 晒晒你喜欢的那款播放器</a>
                        </div>
                        <div class="forumItemContentInfo">
                            <span><a href="#">测试用户</a></span>
                            <span>类别 <a href="#">影音</a></span>
                            <span>发表时间 昨天</span>
                            <span><span class="glyphicon glyphicon-comment"></span>6</span>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
        </div>
        <div class="forumRightPart col-md-4">

            <div class="well forumUserInfo">
                <div>
                    <img width="90" height="90" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png"  class="img-responsive">
                    <span>初级</span>
                </div>

                <div>
                    <span>用户名</span>
                    <div>
                        <a><span>0</span><span>帖子</span></a>
                        <a><span>0</span><span>评论</span></a>
                        <a><span>0</span><span>关注</span></a>
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
