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

    @include('tail.layout.header', ['active' => ''])

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- My Info -->
                <div class="well">
                    <ul class="nav nav-pills" style="font-size: x-large;">
                        <li role="presentation" class="active"><a href="#post" data-toggle="pill">ta的帖子</a></li>
                        <li role="presentation"><a href="#reply" data-toggle="pill">ta的回复</a></li>
                        <li><a href="#collect" data-toggle="pill">ta的收藏</a></li>
                        <li><a href="#zan" data-toggle="pill">ta的点赞</a></li>
                    </ul>
                    <br/>
                    <hr/>
                    <br/>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="post">
                            @foreach($params['articles'] as $article)
                                <div>
                                    <a href="/article/{{ $article->id }}">{{ $article->title }}</a>
                                </div>
                                <div class="forumItemContentInfo">
                                    <span>类别 <a href="#">{{ $article->type }}</a></span>
                                    <span>发布时间 {{ date("Y年m月d日",strtotime($article->createTime)) }}</span>
                                    <span class="glyphicon glyphicon-thumbs-up">{{ $article->upNum }}</span>
                                    <span><span class="glyphicon glyphicon-comment"></span>{{ $article->commentNum }}</span>
                                </div>
                                <hr>
                                @endforeach
                            @foreach($params['ties'] as $tie)
                                    <div>
                                        <a href="/kinkTie/{{ $tie->kid }}">{{ $tie->title }}</a>
                                    </div>
                                    <div class="">
                                        <span>类别 <a href="#">{{ $tie->type }}</a></span>
                                        <span>发布时间 {{ date("Y年m月d日",($tie->createTime)) }}</span>
                                        <span class="glyphicon glyphicon-thumbs-up">{{ $tie->upNum }}</span>
                                        <span><span class="glyphicon glyphicon-comment"></span>{{ $tie->commentNum }}</span>
                                    </div>
                                    <hr>
                                @endforeach
                            {{--<button type="button" class="btn btn-default btn-lg btn-block">查看更多信息</button>--}}
                        </div>
                        <div class="tab-pane fade" id="reply">
                            @foreach($params['articleComments'] as $articleComment)
                                <div>
                                    <a href="/article/{{ $articleComment->akid }}">{{ $articleComment->content }}</a>
                                </div>
                                <div class="">
                                    <span>发布时间 {{ date("Y年m月d日",($articleComment->createtime)) }}</span>
                                </div>
                                <hr>
                            @endforeach
                                @foreach($params['tieComments'] as $tieComment)
                                    <div>
                                        <a href="/kinkTie/{{ $tieComment->akid }}">{{ $tieComment->content }}</a>
                                    </div>
                                    <div class="">
                                        <span>发布时间 {{ date("Y年m月d日",($tieComment->createtime)) }}</span>
                                    </div>
                                    <hr>
                                @endforeach
                        </div>
                        <div class="tab-pane fade" id="collect">
                            <p></p>
                        </div>
                        <div class="tab-pane fade" id="zan">
                            <p></p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="well">
                    <div class="row">
                        <img width="250" height="130" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-05-19%20%E4%B8%8A%E5%8D%881.14.18.png"></img>
                        <!-- /.col-lg-6 -->
                        <h1 style="text-align: center; font-size: 16px"> {{ $params['user']['name'] }}</h1>
                        <br/>
                        <p style="text-align: center">
                        <button type="button" class="btn btn-success" style="font-size: large;"><span>+加关注</span></button>
                        </p>
                        <hr>
                        <div style="font-size: 16px; text-align: center">{{ $params['user']['followNum'] }} 关注 &nbsp;&nbsp; {{ $params['user']['fans'] }} 粉丝 &nbsp;&nbsp;  {{ $params['user']['postNum'] }} 帖子</div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    @include('tail.layout.footer')


</body>

</html>
