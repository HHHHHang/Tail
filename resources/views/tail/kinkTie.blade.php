<!DOCTYPE html>
<html lang="en">

<head>

	@include('tail.layout.lib')

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Blog Home - Start Bootstrap Template</title>


    <link href="{{ asset('css/bootstrap/style.css') }}" rel="stylesheet" type="text/css" >

    <link href="{{ asset('css/forum-detail.css') }}" rel="stylesheet" type="text/css" >

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
    			$('#up').html('已赞')
    			console.log($('#up'))
				$('#up').click(function(){
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
    			$('#collect').html('已收藏')
				$('#collect').click(function(){
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

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <div class="well forumDetailDiv">
                <a href="/forum/tie"><span class="glyphicon glyphicon-chevron-left"></span>纠结帖子</a>
                <span>{{ $params['title'] }}</span>
                <div class="forumDetailInfo">
                    <span>阅读人数: {{ $params['viewNum'] }}</span>
                    <span>分类: {{ $params['type'] }}</span>
                    <span>发布时间: 昨天</span>
                    <span><span id="upNum" class="glyphicon glyphicon-thumbs-up"></span>{{ $params['upNum'] }}</span>
                    <span><span class="glyphicon glyphicon-comment"></span>{{ $params['commentNum'] }}</span>
                </div>
                <div class="forumDetailContent">
                    {!! $params['content'] !!}
                </div>
                <div>
                    <button id="up">赞</button>
                    <button id="collect">收藏</button>
                </div>

            </div>

            <div class="well forumDetailComment">
                <span>评论:</span>
				<form method="POST" role="form" action="/kinkTie/{{ $params['aid'] }}">
					<div class="form-group">
						<textarea name="content" class="form-control" rows="3"></textarea>
					</div>
					<input type="hidden" name="aid" value="{{ $params['aid'] }}" />
					<input type="hidden" name="receiverId" value="{{ $params['postUserId'] }}" />
					<input type="hidden" name="receiverName" value="" />
					<input type="hidden" name="receiverCommentId" value="0" />
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn">评论</button>
				</form>

				@foreach ($comments as $commentInfo)
					<div class="media" id="{{ $commentInfo['comment']->id }}">
						<a class="pull-left" href="#">
							<img class="media-object" width="64" height="64" src="{{$commentInfo['avatar']}}" alt="">
						</a>
						<div class="media-body" id="{{ $commentInfo['comment']->uid }}">
							<input type="hidden" class="rname" value="{{ $commentInfo['comment']->receiverName }}">
							<input type="hidden" class="rcid" value="{{ $commentInfo['comment']->receiverCommentId }}">
							<h4 class="media-heading"><span>{{ $commentInfo['comment']->senderName }} </span><small>{{ date('Y-m-d H:i:s', strtotime($commentInfo['comment']->createtime))   }}</small></h4>
							<p class="commentContent">{{ $commentInfo['comment']->content  }}</p>
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
<!-- /.container -->

@include('tail.layout.footer')

</body>

</html>

<script>

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