<!DOCTYPE html>
<html lang="en">

<head>

    @include('tail.layout.lib')
    <link href="{{URL::asset('css/forum-home.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/search.css')}}" rel="stylesheet" type="text/css" />

    <title>数字良品-搜索</title>
</head>

<body>

@include('tail.layout.header', ['active' => ''])

<div class="container">
    <div class="row">
        <div class="forumLeftPart col-md-8">

            <div class="forumSearch well">
                <span>站内搜索</span>
                <div class="input-group">
                    <input id='keywordTopic' type="text" class="form-control" value="{{$params['keyword']}}">
                        <span class="input-group-btn">
                            <button id='searchTopic' class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                </div>
            </div>

            <div class="forumTabDiv">
                <span><a href="/search/article">精选文章</a></span>
                <span><a href="/search/forum">帖子</a></span>
                <span class="checked"><a href="/search/topic">话题</a></span>
                <span></span>
                <span><a>排序方式</a></span>
            </div>

            <div class="forumListDiv">
                @foreach($params['topics'] as $topic)
                    <div class="forumItemDiv">
                        <img width="50" height="50" src="{{ $topic['avatar'] }}"  class="forumItemPic img-circle img-responsive">

                        <div class="forumItemContent">
                            <div>
                                <a href="{{ $topic['link'] }}">{{ $topic['name'] }}</a>
                            </div>
                            <div class="forumItemContentInfo">
                                <span><a href="#">{{ $topic['postName'] }}</a></span>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Blog Sidebar Widgets Column -->
        </div>
		@include('tail.layout.user')
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
