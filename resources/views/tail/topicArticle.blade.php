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

<div class="article-picture">

    <div class="article-background" style="background: url({{ $params['article']->image }}) no-repeat; height: 100%;width: 100%;
            background-size: 100% 100%;">
        <div class="article-background-color">
            <h1>{{ $params['article']->title }}</h1>
            <div class="article-writer">
                <a href="#">
                    <img src="{{ $params['author']['avatar'] }}"/>
                </a>
                <span>{{ $params['author']['name'] }}</span>
                <span style="font-size: 18px;font-weight: 700;padding:5px;font-family:Georgia">·</span>
                <span>{{ date(" Y 年 m 月 d 日", strtotime($params['article']->createTime)) }}</span>
                <div class="article-view">
                    <span class="glyphicon glyphicon-eye-open">&nbsp;{{ $params['article']->viewNum }}</span>
                </div>
                <div class="article-view">
                    <span class="glyphicon glyphicon-comment">&nbsp;{{ $params['article']->commentNum }}</span>
                </div>
                <div class="article-view">
                    <span class="glyphicon glyphicon-thumbs-up">&nbsp;{{ $params['article']->upNum }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="articleDetailDiv">
    <div class="articleDetailContent">
        {!! $params['article']->content !!}
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
        {{--<form method="POST" role="form" action="/kinkTie/{{ $params['aid'] }}">--}}
        <div class="form-group">
            <textarea name="content" class="form-control" rows="3"></textarea>
        </div>
        {{--<input type="hidden" name="id" value="{{ $params['aid'] }}" />--}}
        <button type="submit" class="btn">评论</button>
    </form>
    {{--<span class="glyphicon glyphicon-comment" style="color: #969a9e;"><span>&nbsp;全部评论<span style="font-size: 13px;color: #559FEB;">  {{ sizeof($comments) }}条</span></span></span>--}}
    <hr>
    {{--@foreach ($comments as $comment)--}}
        {{--<div class="media">--}}
            {{--<a class="pull-left" href="#">--}}
                {{--<img class="media-object" width="64" height="64" src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png" alt="">--}}
            {{--</a>--}}
            {{--<div class="media-body">--}}
                {{--<h4 class="media-heading">{{ $comment->username }}--}}
                    {{--<small>{{ date('Y-m-d H:i:s', $comment->createtime)   }}</small>--}}
                {{--</h4>--}}
                {{--{{ $comment->content  }}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<hr>--}}
    {{--@endforeach--}}
    <span style="text-align: center; padding: 15px 0">评论已全部加载完毕</span>
</div>


@include('tail.layout.footer')

</body>

</html>