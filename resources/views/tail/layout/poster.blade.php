
@if ($params['user']['id'] != 2)
	<script>
		$( document ).ready(function() {

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			console.log({{ $params['hasFollow'] }})
			if ({{ $params['hasFollow'] }} == 0) {
				canFollow()
			} else if ({{ $params['hasFollow'] }} == 1) {
				cantFollow()
			}

			if ({{ $params['user']['id'] }} == 2) {
				$('#follow').unbind()
				$('#follow').click(function(){
					alert('请先登录!')
				})
			}

			function canFollow() {
				$('#follow').click(function(){
					$.ajax({
						url: "/personInfo/follow",
						type: "post",
						data: {
							id : {{ $params['poster']['id'] }},
							uid: {{ $params['user']['id'] }}
						},
						success: function(data) {
							$('#follow').html('已关注')
							$('#follow').unbind()
							cantFollow()
							window.location.reload()
							console.log(data)
						}
					})
				})
			}

			function cantFollow() {
				$('#follow').html('已关注')
				console.log($('#follow'))
				$('#follow').click(function(){
					$.ajax({
						url: "/personInfo/cancelFollow",
						type: "post",
						data: {
							id : {{ $params['poster']['id'] }},
							uid: {{ $params['user']['id'] }}
						},
						success: function(data) {
							$('#follow').html('+加关注')
							$('#follow').unbind()
							canFollow()
							window.location.reload()
							console.log(data)
						}
					})
				})
			}

		})
	</script>
<div class="col-md-4 sidebarBlock">

	<div  data-spy="affix">

		<div class="well forumPosterInfo" >

			<div class="forumUserInfo">
				<div>
					<img width="90" height="90" src="{{$params['poster']['avatar']}}" class="img-responsive">
					{{--<span>{{$params['user']['level']}}用户</span>--}}
					<span style="height:25px;padding-top:3px;font-size: 18px">用户</span>
				</div>
				<div>
{{--					<span>{{$params['user']['name']}}</span>--}}
					<span>{{$params['poster']['name']}}</span>
					<div>
						<a><span>{{ $params['poster']['postNum'] }}</span><span>帖子</span></a>
						<a><span>{{ $params['poster']['commentNum'] }}</span><span>评论</span></a>
						<a><span>{{ $params['poster']['followNum'] }}</span><span>关注</span></a>
					</div>
				</div>

			</div>
			<div>
				<button id="follow" class="btn">加关注</button>
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
