<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- jQuery -->
    <script src="{{URL::asset('js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/search.js')}}"></script>


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/bootstrap/style.css') }}" rel="stylesheet" type="text/css" >


    <link href="{{ asset('css/forum-detail.css') }}" rel="stylesheet" type="text/css" >

    <!-- Custom CSS -->
    <link href="{{URL::asset('css/navigation.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/sidebar.css')}}" rel="stylesheet" type="text/css" />



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
                <li><a href="/search/article">搜索</a></li>

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

            <div class="well forumDetailDiv">
                <a href="/forum/tie"><span class="glyphicon glyphicon-chevron-left"></span>纠结帖子</a>
                <span>{{ $params['title'] }}</span>
                <div class="forumDetailInfo">
                    <span>阅读人数: 10</span>
                    <span>分类: {{ $params['type'] }}</span>
                    <span>发布时间: 昨天</span>
                    <span><span class="glyphicon glyphicon-thumbs-up"></span>{{ $params['upNum'] }}</span>
                    <span><span class="glyphicon glyphicon-comment"></span>{{ $params['commentNum'] }}</span>
                </div>
                <div class="forumDetailContent">
                    {!! $params['content'] !!}
                </div>
                <div>
                    <button>赞</button>
                    <button>收藏</button>
                </div>

            </div>

            <div class="well forumDetailComment">
                <span>评论:</span>
                <form method="POST" role="form" action="/kinkTie/{{ $params['aid'] }}">
                    <div class="form-group">
                        <textarea name="content" class="form-control" rows="3"></textarea>
                    </div>
                    <input type="hidden" name="id" value="{{ $params['aid'] }}" />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn">评论</button>
                </form>

                @foreach ($comments as $comment)
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
                @endforeach
            </div>
        </div>


        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4 sidebarBlock">

            <div class="well forumPosterInfo">

                <div class="forumUserInfo">
                    <div>
                        <img width="90" height="90" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png" class="img-responsive">
                        <span>初级用户</span>
                    </div>
                    <div>
                        <span>作者信息</span>
                        <span>测试用户</span>
                        <div>
                            <a><span>1</span><span>帖子</span></a>
                            <a><span>0</span><span>评论</span></a>
                            <a><span>0</span><span>关注</span></a>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn">加关注</button>
                    <button class="btn">发私信</button>
                </div>
            </div>
            <div class="forumSearch well">
                <span>站内搜索</span>
                <form class="input-group" method="GET" role="form" action="/search/forum">
                    <input type="text" class="form-control">
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
<!-- /.container -->

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
