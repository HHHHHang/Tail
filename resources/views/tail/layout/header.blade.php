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
                    <li class="{{$active=='index' ? 'active' : ''}}"><a href="/">首页</a></li>
                    <li class="{{$active=='article' ? 'active' : ''}}"><a href="/forum">文章</a></li>
                    <li class="{{$active=='bbs' ? 'active' : ''}} dropdown">
                        <a href="/forum/tie" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">论坛 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/forum/tie">纠结帖子</a></li>
                            <li><a href="#">其它帖子</a></li>
                        </ul>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (isset($params['user']) && $params['user']['id'] != 2)
                        <li><a href="/myinfo?name={{ $params['user']['name'] }}">{{  $params['user']['name'] }}</a></li>
                        <li><a href="/logout">退出</a></li>
                    @else
                        <li><a href="/login">登录</a></li>
                        <li><a href="/login">注册</a></li>
                    @endif
                </ul>

                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">标题<span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-left">
                                    <li><a href="#">文章</a></li>
                                    <li><a href="#">帖子</a></li>
                                    <li><a href="#">话题</a></li>
                                </ul>
                            </div>
                            <input type="text" class="form-control" placeholder="搜索">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">搜索</button>
                            </span>
                        </div>
                    </div>
                </form>
            </div><!--/.nav-collapse -->
        </div>
    </nav>