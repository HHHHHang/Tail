
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
    <script src="http://115.28.180.158:84/js/search.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/bootstrap/style.css') }}" rel="stylesheet" type="text/css" >

    <!-- Custom CSS -->
    <link href="{{URL::asset('css/navigation.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/sidebar.css')}}" rel="stylesheet" type="text/css" />
    <link href="http://115.28.180.158:84/css/forum-home.css" rel="stylesheet" type="text/css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>数字良品-论坛</title>
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
                <li class="dropdown active">
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
                    <li><a href="/myinfo?name={{ $params['user']['name'] }}">{{  $params['user']['name'] }}</a></li>
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

            <div class="forumTypeDiv">
                <div class="checked"><a href="/forum"><span class="glyphicon glyphicon-inbox"></span><span>全部</span></a></div>
                @if ($params['isTie'])
                <div><a href="/forum/tie/手机"><span class="glyphicon glyphicon-phone"></span><span>手机</span></a></div>
                <div><a href="/forum/tie/摄影"><span class="glyphicon glyphicon-camera"></span><span>摄影</span></a></div>
                <div><a href="/forum/tie/电脑"><span class="glyphicon glyphicon-floppy-open"></span><span>电脑</span></a></div>
                <div><a href="/forum/tie/平板"><span class="glyphicon glyphicon-phone"></span><span>平板</span></a></div>
                <div><a href="/forum/tie/咨询"><span class="glyphicon glyphicon-bullhorn"></span><span>资讯</span></a></div>
                <div><a href="/forum/tie/视频"><span class="glyphicon glyphicon-facetime-video"></span><span>视频</span></a></div>
                <div><a href="/forum/tie/影音"><span class="glyphicon glyphicon-film"></span><span>影音</span></a></div>
                <div><a href="/forum/tie/数码"><span class="glyphicon glyphicon-facetime-video"></span><span>数码</span></a></div>
                <div><a href="/forum/tie/周边"><span class="glyphicon glyphicon-send"></span><span>周边</span></a></div>
                <div><a href="/forum/tie/生活"><span class="glyphicon glyphicon-home"></span><span>生活</span></a></div>
                <div><a href="/forum/tie/文具"><span class="glyphicon glyphicon-pencil"></span><span>文具</span></a></div>
                <div><a href="/forum/tie/游戏"><span class="glyphicon glyphicon-console"></span><span>游戏</span></a></div>
                @else
                <div><a href="/forum/手机"><span class="glyphicon glyphicon-phone"></span><span>手机</span></a></div>
				<div><a href="/forum/摄影"><span class="glyphicon glyphicon-camera"></span><span>摄影</span></a></div>
				<div><a href="/forum/电影"><span class="glyphicon glyphicon-floppy-open"></span><span>电脑</span></a></div>
				<div><a href="/forum/平板"><span class="glyphicon glyphicon-phone"></span><span>平板</span></a></div>
				<div><a href="/forum/咨询"><span class="glyphicon glyphicon-bullhorn"></span><span>资讯</span></a></div>
				<div><a href="/forum/视频"><span class="glyphicon glyphicon-facetime-video"></span><span>视频</span></a></div>
				<div><a href="/forum/影音"><span class="glyphicon glyphicon-film"></span><span>影音</span></a></div>
				<div><a href="/forum/数码"><span class="glyphicon glyphicon-facetime-video"></span><span>数码</span></a></div>
				<div><a href="/forum/周边"><span class="glyphicon glyphicon-send"></span><span>周边</span></a></div>
				<div><a href="/forum/生活"><span class="glyphicon glyphicon-home"></span><span>生活</span></a></div>
				<div><a href="/forum/文具"><span class="glyphicon glyphicon-pencil"></span><span>文具</span></a></div>
				<div><a href="/forum/游戏"><span class="glyphicon glyphicon-console"></span><span>游戏</span></a></div>
				@endif
            </div>
            <div class="forumTabDiv">
				@if (!$params['isTie'])
					<span class="checked"><a href="/forum">精品文章</a></span>
					<span><a href="/forum/tie">全部帖子</a></span>
                @else
                	<span><a href="/forum">精品文章</a></span>
                    <span class="checked"><a href="/forum/tie">全部帖子</a></span>
                @endif
                <span></span>
                <span><a>排序方式</a></span>
            </div>
            <div class="forumListDiv">
                @foreach ( $params['articlesInfo'] as $item )
                    <div class="forumItemDiv">
                        <img width="50" height="50" src="{{ $item['avatar'] }}"  class="forumItemPic img-circle img-responsive">

                        <div class="forumItemContent">
                            <div>
                                <a href="{{ $item['link'] }}">{{ $item['title'] }}</a>
                            </div>
                            <div class="forumItemContentInfo">
                                <span><a href="#">{{ $item['name'] }}</a></span>
                                <span>类别 <a href="#">{{ $item['type'] }}</a></span>
                                <span>发步时间 {{ $item['publishTime'] }}</span>
                                <span><span class="glyphicon glyphicon-comment"></span>{{ $item['commentNum'] }}</span>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Blog Sidebar Widgets Column -->
        </div>
        <div class="sidebarBlock col-md-4">

            <div class="well forumUserInfo">
                <div>
                    <img width="90" height="90" src="{{ $params['user']['avatar'] }}"  class="img-responsive">
                    <span>{{ $params['user']['level'] }}</span>
                </div>

                <div>
                    <span>{{ $params['user']['name'] }}</span>
                    <div>
                        <a><span>{{ $params['user']['postNum'] }}</span><span>帖子</span></a>
                        <a><span>{{ $params['user']['commentNum'] }}</span><span>评论</span></a>
                        <a><span>{{ $params['user']['followNum'] }}</span><span>关注</span></a>
                    </div>
                </div>
            </div>

            <div class="forumNewBtn">
                <button type="button" class="btn" onclick="{location.href = '/new/forum'}">发布帖子</button>
            </div>

            <div class="forumSearch well">
                <span>站内搜索</span>
                <div class="input-group">
					<input id='keyword' type="text" class="form-control" value="">
						<span class="input-group-btn">
							<button id='search' class="btn btn-default" type="button">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
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
