<div class="forumRightPart col-md-4">
	<div class="well forumUserInfo">
		<div>
			<img width="90" height="90" src="{{ $params['user']['avatar'] }}"  class="img-responsive">
			<span>{{ $params['user']['level'] }}</span>
		</div>

		<div>
			<span>{{$params['user']['name']}}</span>
			<div>
				<a><span>{{ $params['user']['postNum'] }}</span><span>帖子</span></a>
				<a><span>{{ $params['user']['commentNum'] }}</span><span>评论</span></a>
				<a><span>{{ $params['user']['followNum'] }}</span><span>关注</span></a>
			</div>
		</div>
	</div>
</div>