
@if ($params['user']['id'] != 2)
<div class="col-md-4 sidebarBlock">

	<div  data-spy="affix">

		<div class="well forumPosterInfo" >

			<div class="forumUserInfo">
				<div>
					<img width="90" height="90" src="{{$params['user']['avatar']}}" class="img-responsive">
					{{--<span>{{$params['user']['level']}}用户</span>--}}
					<span>用户</span>
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
	</div>

</div>
@else

<div class="col-md-4 sidebarBlock">
	<div  data-spy="affix">
		<div class="well forumPosterInfo visitor">
			<span>您尚未登陆</span>
			<div>
				<button class="btn" onclick="window.location.href='/login'">登录</button>
				<button class="btn" onclick="window.location.href='/login'">注册</button>
			</div>
		</div>
	</div>
</div>
@endif
