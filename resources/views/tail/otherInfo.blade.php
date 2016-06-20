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


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/bootstrap/style.css') }}" rel="stylesheet" type="text/css" >


    <!-- Custom CSS -->
    <link href="{{URL::asset('css/navigation.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/blog-home.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/person-info.css')}}" rel="stylesheet" type="text/css" />

    <script>
        $( document ).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            console.log({{ $params['hasFollow'] }})
            if ({{ $params['hasFollow'] }} == 0) {
                canFollow()
            } else if ({{ $params['hasFollow'] }} == 1) {
                cantFollow()
            }

            if ({{ $params['user']['id'] }} == 2) {
                $('#follow').unbind()
                $('#follow').click(function(){
                    alert('请先登录!')
                })
            }

            function canFollow() {
                $('#follow').click(function(){
                    $.ajax({
                        url: "/personInfo/follow",
                        type: "post",
                        data: {
                            id : {{ $params['userInfo']['id'] }},
                            uid: {{ $params['user']['id'] }}
                        },
                        success: function(data) {
                            $('#follow').html('已关注')
                            $('#follow').unbind()
                            cantFollow()
                            window.location.reload()
                            console.log(data)
                        }
                    })
                })
            }

            function cantFollow() {
                $('#follow').html('已关注')
                console.log($('#follow'))
                $('#follow').click(function(){
                    $.ajax({
                        url: "/personInfo/cancelFollow",
                        type: "post",
                        data: {
                            id : {{ $params['userInfo']['id'] }},
                            uid: {{ $params['user']['id'] }}
                        },
                        success: function(data) {
                            $('#follow').html('+加关注')
                            $('#follow').unbind()
                            canFollow()
                            window.location.reload()
                            console.log(data)
                        }
                    })
                })
            }

        })
    </script>


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
                                <div class="info-box">
                                    <h1><a href="/article/{{ $article->id }}">{{ $article->title }}</a></h1>
                                </div>
                                <div class="detail-info">
                                    <span>类别 <a href="#">{{ $article->type }}</a></span>
                                    <span>&nbsp;发布时间 {{ date("Y年m月d日",strtotime($article->createTime)) }}</span>
                                    <span>&nbsp;<span class="glyphicon glyphicon-thumbs-up"></span>{{ $article->upNum }}</span>
                                    <span>&nbsp;<span class="glyphicon glyphicon-comment"></span>{{ $article->commentNum }}</span>
                                </div>
                                <hr>
                            @endforeach
                            @foreach($params['topicArticles'] as $topicArticle)
                                <div class="info-box">
                                    <h1><a href="/topic/{{$topicArticle->image ? "article" : "noPicTopicArticle"}}/{{ $topicArticle->id }}">{{ $topicArticle->title }}</a></h1>
                                </div>
                                <div class="detail-info">
                                    <span>&nbsp;发布时间 {{ date("Y年m月d日",strtotime($topicArticle->createTime)) }}</span>
                                    <span>&nbsp;<span class="glyphicon glyphicon-thumbs-up"></span>{{ $topicArticle->upNum }}</span>
                                    <span>&nbsp;<span class="glyphicon glyphicon-comment"></span>{{ $topicArticle->commentNum }}</span>
                                </div>
                                <hr>
                            @endforeach
                            @foreach($params['ties'] as $tie)
                                <div class="info-box">
                                    <h1><a href="/kinkTie/{{ $tie->kid }}">{{ $tie->title }}</a></h1>
                                </div>
                                <div class="detail-info">
                                    <span>&nbsp;类别 <a href="#">{{ $tie->type }}</a></span>
                                    <span>&nbsp;发布时间 {{ date("Y年m月d日",($tie->createTime)) }}</span>
                                    <span>&nbsp;<span class="glyphicon glyphicon-thumbs-up"></span>{{ $tie->upNum }}</span>
                                    <span>&nbsp;<span class="glyphicon glyphicon-comment"></span>{{ $tie->commentNum }}</span>
                                </div>
                                <hr>
                            @endforeach
                            {{--<button type="button" class="btn btn-default btn-lg btn-block">查看更多信息</button>--}}
                        </div>
                        <div class="tab-pane fade" id="reply">
                            @foreach($params['comments'] as $comment)
                                <div class="">
                                    @if($comment->type == 'article')
                                        <h1><a href="/article/{{ $comment->akid }}">{{ $comment->content }}</a></h1>
                                    @elseif($comment->type == 'tie')
                                        <h1><a href="/kinkTie/{{ $comment->akid }}">{{ $comment->content }}</a></h1>
                                    @elseif($comment->type == 'topicArticle')
                                        <h1><a href="/topic/article/{{ $comment->akid }}">{{ $comment->content }}</a></h1>
                                    @endif
                                </div>
                                <div class="detail-info">
                                    <span>发布时间 {{ date("Y年m月d日", strtotime($comment->createtime)) }}</span>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="collect">
                            @foreach($params['collectArticles'] as $collectArticle)
                                <div class="info-box">
                                    <h1><a href="/article/{{ $collectArticle->id }}">{{ $collectArticle->title }}</a></h1>
                                </div>
                                <div class="detail-info">
                                    <span>类别 <a href="#">{{ $collectArticle->type }}</a></span>
                                    <span>发布时间 {{ date("Y年m月d日",strtotime($collectArticle->createTime)) }}</span>
                                    <span class="glyphicon glyphicon-thumbs-up">{{ $collectArticle->upNum }}</span>
                                    <span><span class="glyphicon glyphicon-comment"></span>{{ $collectArticle->commentNum }}</span>
                                </div>
                                <hr>
                                @endforeach
                            @foreach($params['collectTies'] as $collectTie)
                                    <div class="info-box">
                                        <h1><a href="/kinkTie/{{ $collectTie->kid }}">{{ $collectTie->title }}</a></h1>
                                    </div>
                                    <div class="detail-info">
                                        <span>类别 <a href="#">{{ $collectTie->type }}</a></span>
                                        <span>发布时间 {{ date("Y年m月d日",($collectTie->createTime)) }}</span>
                                        <span class="glyphicon glyphicon-thumbs-up">{{ $collectTie->upNum }}</span>
                                        <span><span class="glyphicon glyphicon-comment"></span>{{ $collectTie   ->commentNum }}</span>
                                    </div>
                                    <hr>
                                @endforeach
                        </div>
                        <div class="tab-pane fade" id="zan">
                            @foreach($params['upArticles'] as $upArticle)
                                <div class="info-box">
                                    <h1><a href="/article/{{ $upArticle->id }}">{{ $upArticle->title }}</a></h1>
                                </div>
                                <div class="detail-info">
                                    <span>类别 <a href="#">{{ $upArticle->type }}</a></span>
                                    <span>发布时间 {{ date("Y年m月d日",strtotime($upArticle->createTime)) }}</span>
                                    <span class="glyphicon glyphicon-thumbs-up">{{ $upArticle->upNum }}</span>
                                    <span><span class="glyphicon glyphicon-comment"></span>{{ $upArticle->commentNum }}</span>
                                </div>
                                <hr>
                            @endforeach
                            @foreach($params['upTies'] as $upTie)
                                <div class="info-box">
                                    <h1><a href="/kinkTie/{{ $upTie->kid }}">{{ $upTie->title }}</a></h1>
                                </div>
                                <div class="detail-info">
                                    <span>类别 <a href="#">{{ $upTie->type }}</a></span>
                                    <span>发布时间 {{ date("Y年m月d日",($upTie->createTime)) }}</span>
                                    <span class="glyphicon glyphicon-thumbs-up">{{ $upTie->upNum }}</span>
                                    <span><span class="glyphicon glyphicon-comment"></span>{{ $upTie->commentNum }}</span>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="well">
                    <div class="row">
                        <img class="img-rounded img-circle img-responsive" style="margin-left: 30%; width: 100px;height: 100px;display: inline-block;vertical-align: middle" src={{ $params['userInfo']['avatar'] }}></img>
                        <!-- /.col-lg-6 -->
                        <h1 style="text-align: center; font-size: 16px"> {{ $params['userInfo']['name'] }}</h1>
                        <br/>
                        <p style="text-align: center">
                        <button id="follow" type="button" class="btn btn-success" style="font-size: large;"><span>+加关注</span></button>
                        </p>
                        <hr>
                        <div style="font-size: 16px; text-align: center">{{ $params['userInfo']['followNum'] }} 关注 &nbsp;&nbsp; {{ $params['userInfo']['fans'] }} 粉丝 &nbsp;&nbsp;  {{ $params['userInfo']['postNum'] }} 帖子</div>
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
