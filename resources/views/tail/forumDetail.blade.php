<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- jQuery -->
    <script src="{{URL::asset('js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/bootstrap/style.css') }}" rel="stylesheet" type="text/css" >

    <!-- Custom CSS -->
    <link href="{{URL::asset('css/navigation.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/sidebar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/forum-detail.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>纠结帖子-详情</title>

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


            if ({{ $params['user']['id'] }} == 2) {
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
                    $('#up').html('已赞')
                    $('#up').unbind()

                    $.ajax({
                        url: "/article/up",
                        type: "post",
                        data: {
                            type: 'tie',
                            id : {{ $params['aid'] }},
                            uid: {{ $params['user']['id'] }}
                        },
                        success: function(data) {
                            $('#up').html('已赞')
                            $('#up').unbind()
                            cantUp()
                            console.log(data)
                        }
                    })
                })
            }

            function cantUp() {

                $('#up').click(function(){
                    $('#up').html('赞')
                    $('#up').unbind()

                    $.ajax({
                        url: "/article/cancelUp",
                        type: "post",
                        data: {
                            type: 'tie',
                            id : {{ $params['aid'] }},
                            uid: {{ $params['user']['id'] }}
                        },
                        success: function(data) {
                            $('#up').html('赞')
                            $('#up').unbind()
                            canUp()
                            console.log(data)
                        }
                    })
                })
            }

            function canCollect() {
                $('#collect').click(function(){
                    $('#collect').html('已收藏')
                    $('#up').unbind()
                    cantCollect()

                    $.ajax({
                        url: "/article/collect",
                        type: "post",
                        data: {
                            type: 'tie',
                            id : {{ $params['aid'] }},
                            uid: {{ $params['user']['id'] }}
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
                $('#collect').click(function(){
                    $('#collect').html('收藏')
                    $('#collect').unbind()
                    canCollect()

                    $.ajax({
                        url: "/article/cancelCollect",
                        type: "post",
                        data: {
                            type: 'tie',
                            id : {{ $params['aid'] }},
                            uid: {{ $params['user']['id'] }}
                        },
                        success: function(data) {
                            $('#collect').html('收藏')
                            $('#collect').unbind()
                            canCollect()
                            console.log(data)
                        }
                    })
                })
            }





        })
    </script>


</head>

<body>

    @include('tail.layout.header', ['active' => 'bbs'])

    <div class="container">

        <div class="row">
            <div class="col-md-8">
                <div class="well forumDetailDiv">
                    <a href="/forum/kinkTie"><span class="glyphicon glyphicon-chevron-left"></span>纠结帖子</a>
                    <span>{{ $params['kinkTie']->title }}</span>
                    <div class="forumDetailInfo">
                        <span>阅读人数: {{ $params['kinkTie']->viewNum  }}</span>
                        <span>{{ $params['kinkTie']->type  }}</span>
                        <span>{{ date('Y年m月d日 H:i:s', ($params['kinkTie']->createTime))  }}</span>
                        <span><span class="glyphicon glyphicon-thumbs-up"></span>{{ $params['kinkTie']->upNum  }}</span>
                        <span><span class="glyphicon glyphicon-comment"></span>{{ $params['kinkTie']->commentNum  }}</span>
                    </div>
                    <div class="forumDetailContent">
                        @if ( $params['hasVote'] == 0 )
                            <form action="/choice/{{ $params['aid'] }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if ( $params['multi'] )
                                <span>多项选择 最多选择{{ $params['maxChoiceNum'] }}项</span>
                                <span>共有{{ $params['attendCount'] }}人参与投票</span>
                                <div class="btn-group multiChoice" data-toggle="buttons" id="{{ $params['maxChoiceNum'] }}">
                                    @foreach( $params['options'] as $item )
                                        <div class="checkbox" id="{{ $item->vid }}">
                                            <label>
                                                <input name='check{{ $item->vid }}' type="checkbox">
                                                {{ $item->content }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <span>单项选择</span>
                                <span>共有{{ $params['attendCount'] }}人参与投票</span>
                                <div class="btn-group" data-toggle="buttons">
                                    @foreach( $params['options'] as $item )
                                        <div class="radio" id="{{ $item->vid }}">
                                            <label>
                                                <input type="radio" name="gridRadios" id="gridRadios1" value="{{ $item->vid }}" checked>
                                                {{ $item->content }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <button type="submit" class="btn" style="width: 100%">提交</button>
                            </form>
                        @else
                            @if ( $params['multi'] )
                                <span>多项选择 您已参与投票</span>
                                <span>共有{{ $params['attendCount'] }}人参与投票</span>

                                @foreach( $params['options'] as $item )
                                    <div class="voteResult">
                                        <p><span>{{ $item->content }}</span><span></span><span>已有{{ $item->voteCount }}票 占{{ number_format($item->voteCount * 100.0 / $params['voteCountSum'], 2, '.', '') }}%</span></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $item->voteCount * 1.0 / $params['voteCountSum'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $item->voteCount * 100.0 / $params['voteCountSum'] }}%">
                                                <span class="sr-only">{{ $item->voteCount * 100.0 / $params['voteCountSum'] }}%</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            @else
                                <span>单项选择</span>
                                <span>共有{{ $params['attendCount' ]}}人参与投票</span>
                                <div>
                                    @foreach( $params['options'] as $item )
                                        <div class="voteResult">
                                            <span>{{ $item->content }}  已有{{ $item->voteCount }}票 占{{ number_format($item->voteCount * 100.0 / $params['voteCountSum'], 2, '.', '') }}%</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $item->voteCount * 1.0 / $params['voteCountSum'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $item->voteCount * 100.0 / $params['voteCountSum'] }}%">
                                                    <span class="sr-only">{{ $item->voteCount * 100.0 / $params['voteCountSum'] }}%</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endif
                        <span>{!! $params['introduction'] !!}</span>
                    </div>
                    <div>
                        <button id="up">赞</button>
                        <button id="collect">收藏</button>
                    </div>

                </div>

                <div class="well forumDetailComment">
                    <span>评论:</span>
                    <form method="POST" role="form" action="/forum/Detail/{{ $params['aid'] }}">
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="3"></textarea>
                        </div>
                        <input type="hidden" name="aid" value="{{ $params['aid'] }}" />
                        <input type="hidden" name="receiverId" value="0" />
                        <input type="hidden" name="receiverName" value="" />
                        <input type="hidden" name="receiverCommentId" value="0" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn">评论</button>
                    </form>

                    @foreach ($comments as $comment)
                        <div class="media" id="{{ $comment->id }}">
                            <a class="pull-left" href="#">
                                <img class="media-object" width="64" height="64" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png" alt="">
                            </a>
                            <div class="media-body" id="{{ $comment->uid }}">
                                <input type="hidden" class="rname" value="{{ $comment->receiverName }}">
                                <input type="hidden" class="rcid" value="{{ $comment->receiverCommentId }}">
                                <h4 class="media-heading"><span>{{ $comment->senderName }} </span><small>{{ date('Y-m-d H:i:s', strtotime($comment->createtime))   }}</small></h4>
                                <p class="commentContent">{{ $comment->content  }}</p>
                                <p class="commentBtn"><a onclick="makeComment2Comment(this)">回复</a></p>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                </div>
            </div>


            @include('tail.layout.poster')
        </div>
    </div>
    @include('tail.layout.footer')

</body>

</html>

<script>


    $('input[type=checkbox]').on('click', function () {
        var maxNum = $('.multiChoice').attr('id');

        var choiceNum = 0;
        $('input[type=checkbox]:checked').each(function () {
            choiceNum = choiceNum + 1;
        });

        if (choiceNum > maxNum) {
            alert('最多选择' + maxNum + '项');
            $(this).removeAttr('checked');
        }
    });

    var makeHighlight = function () {
        var textareas = $('.forumDetailComment .commentContent');
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
            $('.forumDetailComment > span:first-child').text('评论 @' + senderName + ':');

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
        $('.forumDetailComment > span:first-child').text('评论:');
    };
</script>
