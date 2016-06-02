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
    <script src="{{URL::asset('js/search.js')}}"></script>


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/bootstrap/style.css') }}" rel="stylesheet" type="text/css" >


    <!-- Custom CSS -->
    <link href="{{URL::asset('css/blog-home.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/navigation.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">数字良品</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">首页</a></li>
                <li class="dropdown">
                    <a href="/forum" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">论坛 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/forum">精选文章</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">帖子专区</li>
                        <li><a href="/forum/tie">纠结帖子</a></li>
                        <li><a href="#">其它帖子</a></li>
                    </ul>
                </li>
                <li><a href="search/article">搜索</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (isset($params['user']))
                    <li><a href="/myinfo?name={{ $user['name'] }}">{{  $user['name'] }}</a></li>
                    <li><a href="/logout">退出</a></li>
                @else
                    <li><a href="/login">登录</a></li>
                    <li><a href="/login">注册</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
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
                    <p class="tie-head">&nbsp;&nbsp;{{ $params['postName'] }}</p>
                    <span><a href="#">&nbsp;&nbsp;<span class="glyphicon glyphicon-film" style="color: rgb(108, 118, 127); font-size: 12px;">{{ $params['type'] }}</span></a></span>

                </div>
                <p class="postTime"><span class="glyphicon glyphicon-time"></span> &nbsp;{{ date("Y-m-d",strtotime($params['createTime'])) }}</p>
                {{--<img class="img-responsive" src="http://7xq64h.com1.z0.glb.clouddn.com/nano.jpg" alt="">--}}
                <hr>
                <p style="text-align:center" href="#" class="title-phone">{{ $params['title'] }}</p>
                <hr>
                {!! $params['content'] !!}
                <a style="margin-left: 550px" href="#"><span class="glyphicon glyphicon-thumbs-up" style="color: #B0B4B7; font-size:20px;">&nbsp;{{ $params['upNum'] }}&nbsp;</span></a>
                <a href="#"><span class="glyphicon glyphicon-comment" style="color: #B0B4B7; font-size:20px;">&nbsp;{{ $params['commentNum'] }}</span></a>
            </div>

            <div class="well">
                <h4 style="margin-bottom: 10px;">评论:</h4>
                <form method="POST" role="form" action="/article/{{ $params['aid'] }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <textarea name="content" class="form-control" rows="3"></textarea>
                    </div>
                    <input type="hidden" name="id" value="{{ $params['aid'] }}" />
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
                <hr>
                <div class="input-group">
                    <input id='keyword' type="text" class="form-control" value="">
                        <span class="input-group-btn">
                            <button id='search' class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4 style="color: rgb(108, 118, 127); margin-bottom: 5px;">频道分类</h4>
                <hr>
                <div class="row">
                    <div class="col-xs-4 col-md-4">
                        <ul class="list-unstyled">
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-phone" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 手机</span></a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-floppy-open" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 电脑</span></a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-bullhorn" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 资讯</span></a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-facetime-video" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 视频</span></a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-send" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 周边</span></a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-phone" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 平板</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-xs-4 col-md-4">
                        <ul class="list-unstyled">
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-camera" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 摄影</span></a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-film" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 影音</span></a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-facetime-video" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 数码</span></a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-plane" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 旅行</span></a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-home" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 生活</span></a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-pencil" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 文具</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-4 col-md-4">
                        <ul class="list-unstyled">
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-heart" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 玩物</span></a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-console" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 游戏</span></a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-blackboard" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 应用</span></a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-education" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 沙龙</span></a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-hourglass" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 活动</span></a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-inbox" style="color: rgb(108, 118, 127); font-size: 17px; margin: 5px;"> 全部</span></a>
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
                <p style="margin-bottom: 5px"><a href="/" class="content-other">中端新「血液」，HTC Desire 830 / 825 正式亮相</a></p>
                <p style="margin-bottom: 5px"><a href="/" class="content-other">溢于「颜」表，华为 G9 青春版体验</a></p>
                <p style="margin-bottom: 5px"><a href="/" class="content-other">尾巴女孩 | 许久不见，那些年的你</a></p>
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
