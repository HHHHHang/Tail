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


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/bootstrap/style.css') }}" rel="stylesheet" type="text/css" >


    <!-- Custom CSS -->
    <link href="{{URL::asset('css/navigation.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/blog-home.css')}}" rel="stylesheet" type="text/css" />

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
                    <li class="active"><a href="/">首页</a></li>
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
                    {{--<li>--}}
                        {{--<div style="padding: 12px 10px">--}}
                            {{--<form method="post" action="">--}}
                                {{--<div class="input-group">--}}
                                    {{--<input type="text" class="form-control" placeholder="搜索文章、帖子">--}}
                                        {{--<span class="input-group-btn">--}}
                                            {{--<button class="btn btn-info" type="button"><span class="glyphicon glyphicon-search"></span></button>--}}
                                        {{--</span>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</li>--}}
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

                <!-- My Info -->
                <div class="well">
                    <ul class="nav nav-pills" style="font-size: x-large;">
                        <li role="presentation" class="active"><a href="#info" data-toggle="pill">基本信息</a></li>
                        <li role="presentation"><a href="#post" data-toggle="pill">帖子</a></li>
                        <li><a href="#comment" data-toggle="pill">评论</a></li>
                    </ul>
                    <br/>
                    <br/>
                    <br/>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="info">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul style="font-size: 16px; padding:0px 20%;">
                                        <li>用户名:   {{ $user['name'] }}</li>
                                        <br/><br/>
                                        <li>个人网页:   </li>
                                        <br/><br/>
                                        <li>微博:   </li>
                                    </ul>
                                </div>
                                <div class="col-md-5">
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <div class="col-md-6">
                                        <ul style="font-size: 16px; text-align: center">
                                            <li>积分:4   </li>
                                            <br/><br/>
                                            <li>威望:0   </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul style="font-size: 16px; text-align: center">
                                            <li>金钱:3   </li>
                                            <br/><br/>
                                            <li>创作积分:0   </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <button type="button" class="btn btn-default btn-lg btn-block">查看更多信息</button>
                        </div>
                        <div class="tab-pane fade" id="post">
                            <p></p>
                        </div>
                        <div class="tab-pane fade" id="comment">
                            <p></p>
                        </div>
                    </div>

                    {{--<form>--}}
                        {{--<div class="input-group">--}}
                          {{--<span class="input-group-addon" id="basic-addon1">个人主页</span>--}}
                          {{--<input type="text" class="form-control" placeholder="example: github.com/xxx/" aria-describedby="basic-addon1">--}}
                        {{--</div>--}}
                        {{--<br>--}}
                        {{--<div class="input-group">--}}
                          {{--<span class="input-group-addon" id="basic-addon1">个性签名</span>--}}
                          {{--<input type="text" class="form-control" placeholder="个性签名" aria-describedby="basic-addon1">--}}
                        {{--</div>--}}
                    {{--</form>--}}

                </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <!-- Blog Search Well -->
                {{--<div class="well">--}}
                    {{--<h4>站内搜索</h4>--}}
                    {{--<div class="input-group">--}}
                        {{--<input type="text" class="form-control">--}}
                        {{--<span class="input-group-btn">--}}
                            {{--<button class="btn btn-default" type="button">--}}
                                {{--<span class="glyphicon glyphicon-search"></span>--}}
                        {{--</button>--}}
                        {{--</span>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <!-- Blog Categories Well -->
                <div class="well">
                    <div class="row">
                        <img width="250" height="130" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-05-19%20%E4%B8%8A%E5%8D%881.14.18.png"></img>
                        <!-- /.col-lg-6 -->
                        <h1 style="text-align: center; font-size: 16px"> {{ $user['name'] }}</h1>
                        <br/>
                        <p style="text-align: center">
                        <button type="button" class="btn btn-success" style="font-size: large;"><span>+加关注</span></button>
                        </p>
                        <hr>
                        <div style="font-size: 16px; text-align: center">0 关注 &nbsp;&nbsp; 0 粉丝 &nbsp;&nbsp;  0 帖子</div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="list-group">
                  <a href="#" class="list-group-item active">
                    基本信息修改
                  </a>
                  <a href="#" class="list-group-item">修改头像</a>
                  <a href="#" class="list-group-item">个人资料</a>
                  <a href="#" class="list-group-item">积分</a>
                  <a href="#" class="list-group-item">密码安全</a>
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
