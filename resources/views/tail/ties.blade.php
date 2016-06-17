
<!DOCTYPE html>
<html lang="en">

<head>

    @include('tail.layout.lib')
    <script src="{{URL::asset('js/search.js')}}"></script>

    <link href="{{URL::asset('css/navigation.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/sidebar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/forum-home.css')}}" rel="stylesheet" type="text/css" />



    <title>数字良品-论坛</title>
</head>

<body>

	@include('tail.layout.header', ['active' => ''])

<div class="container">
    <div class="row">
        <div class="forumLeftPart col-md-8">

            @include('tail.layout.forumType')

            <div class="forumListDiv">
                @foreach ( $params['articlesInfo'] as $item )
                    <div class="forumItemDiv">
                        <img width="50" height="50" src="{{ $item['avatar'] }}"  class="forumItemPic img-circle img-responsive">

                        <div class="forumItemContent">
                            <div>
                                <a href="{{ $item['link'] }}">{{ $item['title'] }}</a>
                            </div>
                            <div class="forumItemContentInfo">
                                <span><a href="#">{{ $item['name'] }}</a></span>
                                <span>类别 <a href="#">{{ $item['type'] }}</a></span>
                                <span>发布时间 {{ $item['publishTime'] }}</span>
                                <span><span class="glyphicon glyphicon-comment"></span>{{ $item['commentNum'] }}</span>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Blog Sidebar Widgets Column -->
        </div>
        <div class="sidebarBlock col-md-4">

            <div class="well forumUserInfo">
                <div>
                    <img width="90" height="90" src="{{ $params['user']['avatar'] }}"  class="img-responsive">
                    <span>{{ $params['user']['level'] }}</span>
                </div>

                <div>
                    <span>{{ $params['user']['name'] }}</span>
                    <div>
                        <a><span>{{ $params['user']['postNum'] }}</span><span>帖子</span></a>
                        <a><span>{{ $params['user']['commentNum'] }}</span><span>评论</span></a>
                        <a><span>{{ $params['user']['followNum'] }}</span><span>关注</span></a>
                    </div>
                </div>
            </div>

            <div class="forumNewBtn">
                <button type="button" class="btn" onclick="{location.href = '/new/forum'}">发布帖子</button>
            </div>

            <div class="forumSearch well">
                <span>站内搜索</span>
                <div class="input-group">
					<input id='keyword' type="text" class="form-control" value="">
						<span class="input-group-btn">
							<button id='search' class="btn btn-default" type="button">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
				</div>
            </div>

        </div>
    </div>
</div>

@include('tail.layout.footer')
</body>

</html>
