<!DOCTYPE html>
<html lang="en">

<head>

	@include('tail.layout.lib')

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Blog Home - Start Bootstrap Template</title>


    <link href="{{ asset('css/bootstrap/style.css') }}" rel="stylesheet" type="text/css" >

    <link href="{{ asset('css/nopic-detail.css') }}" rel="stylesheet" type="text/css" >



    <!-- Custom CSS -->
    <link href="{{URL::asset('css/navigation.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/sidebar.css')}}" rel="stylesheet" type="text/css" />



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

@include('tail.layout.header', ['active' => 'bbs'])

<!-- Page Content -->
<div class="container">


        <!-- Blog Entries Column -->

            <div class="well forumDetailDiv">
                <a href="/topic/detail/{{$params['article']->tid}}"><span class="glyphicon glyphicon-chevron-left"></span>回到话题</a>
                <span>{{ $params['article']->title }}</span>
                <div class="forumDetailInfo">
                    <span>阅读人数: {{ $params['article']->viewNum }}</span>
                    <span>发布时间: {{ $params['article']->createTime }}</span>
                    <span><span id="upNum" class="glyphicon glyphicon-thumbs-up"></span>{{ $params['article']->upNum }}</span>
                    <span><span class="glyphicon glyphicon-comment"></span>{{ $params['article']->commentNum }}</span>
                </div>
                <div class="forumDetailContent">
                    {!! $params['article']->content !!}
                </div>
                <div>
                    <button id="up">赞</button>
                    <button id="collect">收藏</button>
                </div>

            </div>

            <div class="well forumDetailComment">
                <span>评论:</span>
                {{--<form method="POST" role="form" action="/kinkTie/{{ $params['aid'] }}">--}}
                    <div class="form-group">
                        <textarea id="content" class="form-control" rows="3"></textarea>
                    </div>
{{--                    <input type="hidden" name="id" value="{{ $params['aid'] }}" />--}}
{{--                    <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                    <button onclick="comment()" class="btn">评论</button>
                </form>

                @foreach ($params['comments'] as $comment)
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" width="64" height="64" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $comment->username }}
                                <small>{{ $comment->createtime   }}</small>
                            </h4>
                            {{ $comment->content  }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



<!-- /.container -->

@include('tail.layout.footer')

</body>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var comment = function () {
        var content = $('#content').val();
        console.log(content);

        $.ajax({
            type: 'POST',
            url: '/topicArticle/comment/{{$params['article']->id}}',
            data: {
//                   topic: topic,
                content:content
            },
            dataType: 'json',
            success: function (data) {
                console.log(data);
                console.log('success');
                location.href = '/topic/noPicTopicArticle/{{$params['article']->id}}';
            },
            error: function (error) {
                console.log(error);
                console.log('error');
            }
        })
    }
</script>

</html>
