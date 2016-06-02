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
	<script src="{{URL::asset('js/search.js')}}"></script>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/bootstrap/style.css') }}" rel="stylesheet" type="text/css" >

    <!-- Custom CSS -->
    <link href="{{URL::asset('css/navigation.css')}}" rel="stylesheet" type="text/css" />
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
                <li class="active"><a href="search/article">搜索</a></li>

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

<div class="container">
    <div class="row">
        <div class="forumLeftPart col-md-8">

            <div class="forumSearch well">
                <span>站内搜索</span>
                <div class="input-group">
                    <input id='keyword' type="text" class="form-control" value="{{$searchTar}}">
                        <span class="input-group-btn">
                            <button id='search' class="btn btn-default" type="button">
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
            @foreach($params['articlesInfo'] as $article)
                <div class="well">
                    <div>
                        <img style="float: left" width="50" height="50" src="{{ $article['avatar'] }}"   class="img-rounded img-circle img-responsive">
                        <p class="tie-head">&nbsp;&nbsp;{{ $article['name'] }}</p>
                        <span><a href="#">&nbsp;&nbsp;<span class="glyphicon glyphicon-film" style="color: rgb(108, 118, 127); font-size: 12px;">{{ $article['type'] }}</span></a></span>

                    </div>
                    <p class="postTime"><span class="glyphicon glyphicon-time"></span> &nbsp;昨天</p>
                    <hr>
                    <img class="img-responsive" src="{{ $article['image'] }}" alt="">
                    <hr>
                    <div class="postHead"><a href="{{ $article['link'] }}" class="title-phone">{{ $article['title'] }}</a></div>
                    <div class="postContent"><p class="content-phone"> {{ $article['content'] }} </p></div>
                    <a style="margin-left: 550px" href="#"><span class="glyphicon glyphicon-thumbs-up" style="color: #B0B4B7; font-size:20px;">&nbsp;{{ $article['upNum'] }}&nbsp;</span></a>
                    <a href="#"><span class="glyphicon glyphicon-comment" style="color: #B0B4B7; font-size:20px;">&nbsp;{{ $article['commentNum'] }}</span></a>
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
