
@if ($params['user']['id'] != 2)
<div class="col-md-4 sidebarBlock">

	<div class="well forumPosterInfo">

		<div class="forumUserInfo">
			<div>
				<img width="90" height="90" src="{{$params['user']['avatar']}}" class="img-responsive">
				<span>{{$params['user']['level']}}用户</span>
			</div>
					<div>
						<span>{{$params['user']['name']}}</span>
            			<span>{{$params['user']['name']}}</span>
            			<div>
            				<a><span>{{ $params['user']['postNum'] }}</span><span>帖子</span></a>
            				<a><span>{{ $params['user']['commentNum'] }}</span><span>评论</span></a>
            				<a><span>{{ $params['user']['followNum'] }}</span><span>关注</span></a>
            			</div>
            		</div>

		</div>
		<div>
			<button class="btn">加关注</button>
			<button class="btn">发私信</button>
		</div>
	</div>
	<div class="forumSearch well">
		<span>站内搜索</span>
		<form class="input-group" method="GET" role="form" action="/search/forum">
			<input type="text" class="form-control">
			<span class="input-group-btn">
				<button class="btn btn-default" type="submit">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</span>
		</form>
	</div>

</div>
@else

<div class="col-md-4 sidebarBlock">

	<div class="well forumPosterInfo">
		<div>
			<button class="btn"><a href="/login">登录</a></button>
			<button class="btn"><a href="/login">注册</a></button>
		</div>
	</div>

	<div class="forumSearch well">
		<span>站内搜索</span>
		<form class="input-group" method="GET" role="form" action="/search/forum">
			<input type="text" class="form-control">
			<span class="input-group-btn">
				<button class="btn btn-default" type="submit">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</span>
		</form>
	</div>
</div>
@endif
