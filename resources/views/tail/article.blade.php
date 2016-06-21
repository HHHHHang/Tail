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
    <script src="{{URL::asset('js/goToTop.js')}}"></script>


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/bootstrap/style.css') }}" rel="stylesheet" type="text/css" >


    <!-- Custom CSS -->
    <link href="{{URL::asset('css/navigation.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/sidebar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/article-detail.css')}}" rel="stylesheet" type="text/css" />

    <script>
        $( document ).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            console.log({{ $params['hasUp'] }})
            if ({{ $params['hasUp'] }} == 0) {
                canUp()
            } else if ({{ $params['hasUp'] }} == 1) {
                cantUp()
            }

            console.log({{ $params['hasCollect'] }})
            if ({{ $params['hasCollect'] }} == 0) {
                canCollect()
            } else if ({{ $params['hasCollect'] }} == 1) {
                cantCollect()
            }


            if ({{ $params['userInfo']['id'] }} == 2) {
                $('#up').unbind()
                $('#collect').unbind()
                $('#up').click(function(){
                    alert('请先登录!')
                })
                $('#collect').click(function(){
                    alert('请先登录!')
                })
            }

            function canUp() {
                $('#up').click(function(){
                    $.ajax({
                        url: "/article/up",
                        type: "post",
                        data: {
                            type: 'article',
                            id : {{ $params['aid'] }},
                            uid: {{ $params['userInfo']['id'] }}
                        },
                        success: function(data) {
                            $('#up').html('已赞')
                            var a = parseInt($('.article-view > .glyphicon-thumbs-up').text().slice(1)) + 1;
                            $('.article-view > .glyphicon-thumbs-up').text(' ' + a);
                            $('#up').unbind()
                            cantUp()
                            console.log(data)
                        }
                    })
                })
            }

            function cantUp() {
                $('#up').html('已赞')
                $('#up').css('background-color','#458ac9');
                $('#up').css('color','white');
                $('#up').css('border','none');
                console.log($('#up'))
                $('#up').click(function(){
                    $.ajax({
                        url: "/article/cancelUp",
                        type: "post",
                        data: {
                            type: 'article',
                            id : {{ $params['aid'] }},
                            uid: {{ $params['userInfo']['id'] }}
                        },
                        success: function(data) {
                            $('#up').html('赞')
                            var a = parseInt($('.article-view > .glyphicon-thumbs-up').text().slice(1)) - 1;
                            $('.article-view > .glyphicon-thumbs-up').text(' ' + a);
                            $('#up').css('background-color','transparent');
                            $('#up').css('color','black');
                            $('#up').css('border','#B0B4B7 solid 1px');
                            $('#up').unbind()
                            canUp()
                            console.log(data)
                        }
                    })
                })
            }

            function canCollect() {
                $('#collect').click(function(){
                    $.ajax({
                        url: "/article/collect",
                        type: "post",
                        data: {
                            type: 'article',
                            id : {{ $params['aid'] }},
                            uid: {{ $params['userInfo']['id'] }}
                        },
                        success: function(data) {
                            $('#collect').html('已收藏')
                            $('#up').unbind()
                            cantCollect()
                            console.log(data)
                        }
                    })
                })
            }

            function cantCollect() {
                $('#collect').html('已收藏');
                $('#collect').css('background-color','#458ac9');
                $('#collect').css('color','white');
                $('#collect').css('border','none');
                $('#collect').click(function(){
                    $.ajax({
                        url: "/article/cancelCollect",
                        type: "post",
                        data: {
                            type: 'article',
                            id : {{ $params['aid'] }},
                            uid: {{ $params['userInfo']['id'] }}
                        },
                        success: function(data) {
                            $('#collect').html('收藏')
                            $('#collect').css('background-color','transparent');
                            $('#collect').css('color','black');
                            $('#collect').css('border','#B0B4B7 solid 1px');
                            $('#collect').unbind()
                            canCollect()
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

@include('tail.layout.header', ['active' => 'article'])

<!-- Page Content -->

<div class="article-picture">
    <div class="article-background" style="background: url({{ $params['image'] }}) no-repeat; height: 100%;width: 100%;
            background-size: 100% 100%;">
        <div class="article-background-color">
            <h1 style="width: 1265px">{{ $params['title'] }}</h1>
            <div class="article-writer">
                <a href="/otherInfo/{{ $params['posterId'] }}">
                    <img src="{{ $params['avatar'] }}"/>
                </a>
                <span>{{ $params['postName'] }}</span>
                <span style="font-size: 18px;font-weight: 700;padding:5px;font-family:Georgia">·</span>
                <span>{{ date(" Y 年 m 月 d 日", strtotime($params['createTime'])) }}</span>
                <div class="article-view">
                    <span class="glyphicon glyphicon-eye-open">&nbsp;{{ $params['viewNum'] }}</span>
                </div>
                <div class="article-view">
                    <span class="glyphicon glyphicon-comment">&nbsp;{{ $params['commentNum'] }}</span>
                </div>
                <div class="article-view">
                    <span class="glyphicon glyphicon-thumbs-up">&nbsp;{{ $params['upNum'] }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="articleDetailDiv">
    <div class="articleDetailContent">
        {!! $params['content'] !!}
    </div>
    <div class="content_end">全文完</div>
    <div>
        <div id="goToTop"><a href="#"><span class="glyphicon glyphicon-chevron-up"></span></a></div>
        <button id="up">赞</button>
        <button id="collect">收藏</button>
    </div>

</div>
<hr>
<div class="well articleDetailComment article-comments">
    <span>评论:</span>
    <form method="POST" role="form" action="/article/{{ $params['aid'] }}">
        <div class="form-group">
            <textarea name="content" class="form-control" rows="3"></textarea>
        </div>
        <input type="hidden" name="aid" value="{{ $params['aid'] }}" />
        <input type="hidden" name="receiverId" value="{{$params['posterId']}}" />
        <input type="hidden" name="receiverName" value="" />
        <input type="hidden" name="receiverCommentId" value="0" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn">评论</button>
    </form>
    <span class="glyphicon glyphicon-comment" style="color: #969a9e;"><span>&nbsp;全部评论<span style="font-size: 13px;color: #559FEB;">  {{ count($commentsInfo) }}条</span></span></span>
    <hr>
    @foreach ($commentsInfo as $commentInfo)
        <div class="media" id="{{ $commentInfo['comment']->id }}">
            <a class="pull-left" href="#">
                <img class="media-object" width="64" height="64" src="{{$commentInfo['avatar']}}" alt="">
            </a>
            <div class="media-body" id="{{ $commentInfo['comment']->uid }}">
                <input type="hidden" class="rname" value="{{ $commentInfo['comment']->receiverName }}">
                <input type="hidden" class="rcid" value="{{ $commentInfo['comment']->receiverCommentId }}">
                <h4 class="media-heading"><span>{{ $commentInfo['comment']->senderName }} </span><small>{{ date('Y-m-d H:i:s', strtotime($commentInfo['comment']->createtime))   }}</small></h4>
                <p class="commentContent">{{ $commentInfo['comment']->content  }}</p>
                <p class="commentBtn"><a onclick="makeComment2Comment(this)">回复</a></p>
            </div>
        </div>
        <hr>
    @endforeach
    <span style="text-align: center; padding: 15px 0">评论已全部加载完毕</span>
</div>


@include('tail.layout.footer')

</body>

</html>

<script>

    var makeHighlight = function () {
        var textareas = $('.articleDetailComment .commentContent');
        for (var i = 0; i < textareas.length; i ++) {
            if($(textareas[i]).parent().children('input.rcid').val() != 0 ){
                var highlightPart = ' @' + $(textareas[i]).parent().children('input.rname').val() + ' ';
                var content = $(textareas[i]).text();
                content = content.replace(highlightPart, '<span class="highlightPart">' + highlightPart + '</span>');
                $(textareas[i]).html(content);
            }
        }
    };
    makeHighlight();

    var makeComment2Comment = function (a) {
        var senderId = $(a).parent().parent().attr('id');
        var senderName = $(a).parent().prev().prev().children('span').text();
        var senderCommentId = $(a).parent().parent().parent().attr('id');

        if ($('input[name=receiverCommentId]').val() != 0) {
            alert('只能针对一条评论进行回复');
        } else {
            console.log('add comment 2 comment');

            $('input[name=receiverId]').val(senderId);
            $('input[name=receiverName]').val(senderName);
            $('input[name=receiverCommentId]').val(senderCommentId);
            $('.articleDetailComment > span:first-child').text('评论 @' + senderName + ':');

            var content = $('textarea[name=content]').val() + " @" + senderName + " ";
            $('textarea[name=content]').val(content);
            $('textarea[name=content]').focus();

            var top = $('textarea[name=content]')[0].offsetTop - document.body.scrollTop;
            if (top < 0) {
                $('html, body').animate({
                    scrollTop: $('textarea[name=content]')[0].offsetTop
                }, 750);
            }
            addListener2Textarea();
        }
    };

    var addListener2Textarea = function() {
        $('textarea[name=content]').on('keydown',function () {
            var b = $('textarea[name=content]').val().match(' @' + $('input[name=receiverName]').val() + ' ');
            if (b == null) {
                cancleComment2Comment();
            }
        });
    };

    var cancleComment2Comment = function() {
        console.log('no comment 2 comment');
        $('textarea[name=content]').on('keydown',null);
        $('input[name=receiverId]').val(0);
        $('input[name=receiverName]').val('');
        $('input[name=receiverCommentId]').val(0);
        $('.articleDetailComment > span:first-child').text('评论:');
    };
</script>
