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

        console.log('123123');
        function cancelFollow(id){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            cantFollow()

            function cantFollow() {
                console.log($('#follow'))
                    $.ajax({
                        url: "/personInfo/cancelFollow",
                        type: "post",
                        data: {
                            id : id,
                            uid: {{ $params['user']['id'] }}
                        },
                        success: function(data) {
                            $('#' + id).hide()
                        }
                    })
            }

        }

        var pressUploadFileBtn = function () {
            $("#fileUpload").click();
        };
        $(function () {
            $("#fileUpload").change(function () {
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = $("#img-preview");
                    var regex = /(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    dvPreview.html('<img class="img-rounded img-circle img-responsive" style="width: 100px;height: 100px;display: inline-block;vertical-align: middle"  src="{{ $params['userInfo']['avatar'] }}" />');
                    $($(this)[0].files).each(function () {
                        var file = $(this);
                        if (regex.test(file[0].name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = $("<img />");
                                img.attr("src", e.target.result);
                                img.attr("class", "img-rounded img-circle img-responsive");
                                img.attr("style", "width: 100px;height: 100px;display: inline-block;vertical-align: middle");
                                dvPreview.html("");
                                $('#imgSrc').val($("#fileUpload").val());
                                dvPreview.append(img);
                            };
                            var src = reader.readAsDataURL(file[0]);

                        } else {
                            alert(file[0].name + " is not a valid image file.");
                            dvPreview.html("");
                            return false;
                        }
                    });
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            });
        });
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
                <ul class="nav nav-pills" style="font-size: large;">
                    <li role="presentation" class="active"><a href="#post" data-toggle="pill">我的帖子</a></li>
                    <li role="presentation"><a href="#reply" data-toggle="pill">我的回复</a></li>
                    <li><a href="#collect" data-toggle="pill">我的收藏</a></li>
                    <li><a href="#zan" data-toggle="pill">我的点赞</a></li>
                    <li><a href="#myFollow" data-toggle="pill">我的关注</a></li>
                    <li><a href="#myMessage" data-toggle="pill">我的消息</a></li>
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
                        @foreach($params['ties'] as $tie)
                            <div class="info-box">
                                <h1><a href="/kinkTie/{{ $tie->kid }}">{{ $tie->title }}</a></h1>
                            </div>
                            <div class="detail-info">
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
                            <div class="">
                                <h1><a href="/article/{{ $articleComment->akid }}">{{ $articleComment->content }}</a></h1>
                            </div>
                            <div class="detail-info">
                                <span>发布时间 {{ date("Y年m月d日", strtotime($articleComment->createtime)) }}</span>
                            </div>
                            <hr>
                        @endforeach
                        @foreach($params['tieComments'] as $tieComment)
                            <div class="info-box">
                                <h1><a href="/kinkTie/{{ $tieComment->akid }}">{{ $tieComment->content }}</a></h1>
                            </div>
                            <div class="detail-info">
                                <span>发布时间 {{ date("Y年m月d日",($tieComment->createtime)) }}</span>
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
                    <div class="tab-pane fade" id="myFollow">
                        @foreach($params['myFollowsInfos'] as $myFollowsInfo)
                            <div id="{{$myFollowsInfo->uid}}" style="margin-left: 20px">
                                <a href="/otherInfo/{{ $myFollowsInfo->uid }}">
                                    <img src="{{ $myFollowsInfo->avatar }}" style="width: 50px;height: 50px;display: inline-block;vertical-align: middle" class="img-rounded img-circle img-responsive">
                                    <span class="tie-head" style="margin-left: 20px">&nbsp;{{ $myFollowsInfo->name }}</span>
                                </a>
                                <button type="button" onclick="cancelFollow({{ $myFollowsInfo->uid }})" class="btn btn-success" style="font-size: large;float: right;margin-right: 20px"><span>取消关注</span></button>
                                <hr>
                            </div>

                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="myMessage">
                    	@foreach($params['messages'] as $message)
                        <div class="message-detail">
                            <br/>
                            <span>用户<a href="/otherInfo/{{$message['senderUser']->uid}}" class="tie-head">@测试用户</a>{{$message['action']}}了你的<a href="{{$message['href']}}" class="tie-head">文章</a></span>
                            <hr/>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <div class="well">
                <div class="row">

                    <form action="/myinfo/avatar" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="pic" style="text-align: center">
                                <div id="img-preview" style="text-align: center" onclick="pressUploadFileBtn()">
                                    <img class="img-rounded img-circle img-responsive" style="width: 100px;height: 100px;display: inline-block;vertical-align: middle"  src="{{ $params['userInfo']['avatar'] }}" />
                                </div>
                                <input name="file" id="fileUpload" accept="image/*" type="file" multiple="multiple" style="display: none">
                                {{--<input name="file" value="" id="imgSrc" type="hidden"/>--}}
                                <br/>
                                <button type="submit" id="create" class="">修改头像</button>
                            </div>
                    </form>
                    <br/>
                    <!-- /.col-lg-6 -->
                    <h1 style="text-align: center; font-size: 16px"> {{ $params['userInfo']['name'] }}</h1>
                    <br/>
                    <p style="text-align: center">
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
