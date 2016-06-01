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
    <link href="{{URL::asset('css/forum-detail.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>论坛-详情</title>

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
            <div class="col-md-8">
                <div class="well forumDetailDiv">
                    <a href="/forum"><span class="glyphicon glyphicon-chevron-left"></span>纠结帖子</a>
                    <span>{{ $data['title'] }}</span>
                    <div class="forumDetailInfo">
                        <span>阅读人数: {{ $data['viewerCount']  }}</span>
                        <span>{{ $data['type']  }}</span>
                        <span>{{ $data['publishTime']  }}</span>
                        <span><span class="glyphicon glyphicon-thumbs-up"></span>{{ $data['zanCount']  }}</span>
                        <span><span class="glyphicon glyphicon-comment"></span>{{ $data['commentCount']  }}</span>
                    </div>
                    <div class="forumDetailContent">
                        @if ( $data['multi'] )
                            <span>多项选择</span>
                            <span>共有{{ $data['attendCount' ]}}人参与投票</span>
                            <div class="btn-group" data-toggle="buttons">
                                @foreach( $data['options'] as $item )
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">
                                            {{$item}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <span>单项选择</span>
                            <span>共有{{ $data['attendCount' ]}}人参与投票</span>
                            <div class="btn-group" data-toggle="buttons">
                                @foreach( $data['options'] as $item )
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                            {{$item}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <button type="button" class="btn">提交</button>
                        <span>{{ $data['introduction'] }}</span>
                    </div>
                    <div>
                        <button>赞</button>
                        <button>收藏</button>
                    </div>

                </div>

                <div class="well forumDetailComment">
                    <span>评论:</span>
                    <form method="POST" role="form" action="/article">
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="3"></textarea>
                        </div>
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


            <div class="forumRightPart col-md-4">

                <div class="well forumUserInfo">
                    <div>
                        <img width="90" height="90" src="{{ $user1['icon'] }}"  class="img-circle img-responsive">
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
                    <button type="button" class="btn" onclick="{location.href = '/new/forum'}">发布帖子</button>
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
