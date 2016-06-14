<div class="forumTypeDiv">
	<div class="checked"><a href="/forum"><span class="glyphicon glyphicon-inbox"></span><span>全部</span></a></div>
	@if ($params['isTie'])
	<div><a href="/forum/tie/手机"><span class="glyphicon glyphicon-phone"></span><span>手机</span></a></div>
	<div><a href="/forum/tie/摄影"><span class="glyphicon glyphicon-camera"></span><span>摄影</span></a></div>
	<div><a href="/forum/tie/电脑"><span class="glyphicon glyphicon-floppy-open"></span><span>电脑</span></a></div>
	<div><a href="/forum/tie/平板"><span class="glyphicon glyphicon-phone"></span><span>平板</span></a></div>
	<div><a href="/forum/tie/咨询"><span class="glyphicon glyphicon-bullhorn"></span><span>资讯</span></a></div>
	<div><a href="/forum/tie/视频"><span class="glyphicon glyphicon-facetime-video"></span><span>视频</span></a></div>
	<div><a href="/forum/tie/影音"><span class="glyphicon glyphicon-film"></span><span>影音</span></a></div>
	<div><a href="/forum/tie/数码"><span class="glyphicon glyphicon-facetime-video"></span><span>数码</span></a></div>
	<div><a href="/forum/tie/周边"><span class="glyphicon glyphicon-send"></span><span>周边</span></a></div>
	<div><a href="/forum/tie/生活"><span class="glyphicon glyphicon-home"></span><span>生活</span></a></div>
	<div><a href="/forum/tie/文具"><span class="glyphicon glyphicon-pencil"></span><span>文具</span></a></div>
	<div><a href="/forum/tie/游戏"><span class="glyphicon glyphicon-console"></span><span>游戏</span></a></div>
	@else
	<div><a href="/forum/手机"><span class="glyphicon glyphicon-phone"></span><span>手机</span></a></div>
	<div><a href="/forum/摄影"><span class="glyphicon glyphicon-camera"></span><span>摄影</span></a></div>
	<div><a href="/forum/电影"><span class="glyphicon glyphicon-floppy-open"></span><span>电脑</span></a></div>
	<div><a href="/forum/平板"><span class="glyphicon glyphicon-phone"></span><span>平板</span></a></div>
	<div><a href="/forum/咨询"><span class="glyphicon glyphicon-bullhorn"></span><span>资讯</span></a></div>
	<div><a href="/forum/视频"><span class="glyphicon glyphicon-facetime-video"></span><span>视频</span></a></div>
	<div><a href="/forum/影音"><span class="glyphicon glyphicon-film"></span><span>影音</span></a></div>
	<div><a href="/forum/数码"><span class="glyphicon glyphicon-facetime-video"></span><span>数码</span></a></div>
	<div><a href="/forum/周边"><span class="glyphicon glyphicon-send"></span><span>周边</span></a></div>
	<div><a href="/forum/生活"><span class="glyphicon glyphicon-home"></span><span>生活</span></a></div>
	<div><a href="/forum/文具"><span class="glyphicon glyphicon-pencil"></span><span>文具</span></a></div>
	<div><a href="/forum/游戏"><span class="glyphicon glyphicon-console"></span><span>游戏</span></a></div>
	@endif
</div>
	<div class="forumTabDiv">
	@if (!$params['isTie'])
		<span class="checked"><a href="/forum">精品文章</a></span>
		<span><a href="/forum/tie">全部帖子</a></span>
	@else
		<span><a href="/forum">精品文章</a></span>
		<span class="checked"><a href="/forum/tie">全部帖子</a></span>
	@endif
	<span></span>
	<span><a>排序方式</a></span>
</div>