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
                    <li class="{{$active=='article' ? 'active' : ''}}"><a href="/forum/all">文章</a></li>
                    <li class="{{$active=='bbs' ? 'active' : ''}} dropdown">
                        <a href="/forum/tie" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">论坛 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/forum/kinkTie">纠结帖子</a></li>
                            <li><a href="/forum/tie">普通帖子</a></li>
                        </ul>
                    </li>
                    <li class="{{$active=='topic' ? 'active' : ''}}"><a href="/topic">话题广场</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (isset($params['user']) && $params['user']['id'] != 2)
                        <li><a class="hasNewMessage"><span class="glyphicon glyphicon-envelope"></span></a></li>
                        <li><a href="/myinfo?name={{ $params['user']['name'] }}">{{  $params['user']['name'] }}</a></li>
                        <li><a href="/logout">退出</a></li>
                    @else
                        <li><a href="/login">登录</a></li>
                        <li><a href="/login">注册</a></li>
                    @endif
                </ul>

                <div class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">文章 <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-left">
                                    <li><a onclick="changeSearchArea(this)">文章</a></li>
                                    <li><a onclick="changeSearchArea(this)">帖子</a></li>
                                    <li><a onclick="changeSearchArea(this)">话题</a></li>
                                </ul>
                            </div>
                            <input id="header-keyword" type="text" class="form-control" placeholder="搜索" maxlength="20">
                            <span class="input-group-btn">
                                <button id="header-search" class="btn btn-default" type="button" onclick="gotoSearch()"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </div>
                </>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <script>
        var changeSearchArea = function (e) {
            var text = $(e).text();
            $(e).parent().parent().prev().html(text + ' <span class="caret"></span>');
        };

        $('#header-keyword').keydown(function (e) {
            if (e.keyCode == 13) {
                gotoSearch();
            }
        });

        var gotoSearch = function () {
            var keyword = $('#header-keyword').val();
            var type = $('#header-keyword').prev().children('button').text().slice(0, 2);

            console.log(type);
            if (type == '文章') {
                window.location.href = '/search/article/' + keyword;
            } else if (type == '帖子') {
                var s = '/search/forum/' + keyword;
                window.location.href = '/search/forum/' + keyword;
            } else if (type == '话题') {
                window.location.href = '/search/topic/' + keyword;
            }
        };
    </script>