<!DOCTYPE html>
<html lang="en">

<head>

	@include('tail.layout.lib')

    <!-- Custom CSS -->
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
                    <input id="keywordTie" type="text" class="form-control" value="{{$searchTar}}">
                        <span class="input-group-btn">
                            <button id="searchTie" class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                </div>
            </div>

            <div class="forumTabDiv">
                <span><a href="/search/article">精选文章</a></span>
                <span class="checked"><a href="/search/forum">帖子</a></span>
                <span><a>用户</a></span>
                <span></span>
                <span><a>排序方式</a></span>
            </div>
            <div class="forumListDiv">
                @foreach ( $data as $item )
                    <div class="forumItemDiv">
                        <img width="50" height="50" src="{{ $item['icon'] }}"  class="forumItemPic img-circle img-responsive">

                        <div class="forumItemContent">
                            <div>
                                <a href="{{ $item['link'] }}">{{ $item['title'] }}</a>
                            </div>
                            <div class="forumItemContentInfo">
                                <span><a href="#">{{ $item['writer'] }}</a></span>
                                <span>类别 <a href="#">{{ $item['type'] }}</a></span>
                                <span>发表时间 {{ $item['publishTime'] }}</span>
                                <span><span class="glyphicon glyphicon-comment"></span>{{ $item['commentCount'] }}</span>
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

@include('tail.layout.footer')
</body>

</html>
