<div class="forumTypeDiv" id="{{ $params['type'] }}">
	@if ($params['isKinkTie'] == 0)
		<div><a href="/forum/kinkTie"><span class="glyphicon glyphicon-inbox"></span><span>全部</span></a></div>
		<div><a href="/forum/kinkTie/手机"><span class="glyphicon glyphicon-phone"></span><span>手机</span></a></div>
		<div><a href="/forum/kinkTie/电脑"><span class="glyphicon glyphicon-floppy-open"></span><span>电脑</span></a></div>
		<div><a href="/forum/kinkTie/平板"><span class="glyphicon glyphicon-phone"></span><span>平板</span></a></div>
		<div><a href="/forum/kinkTie/资讯"><span class="glyphicon glyphicon-bullhorn"></span><span>资讯</span></a></div>
		<div><a href="/forum/kinkTie/摄影"><span class="glyphicon glyphicon-camera"></span><span>摄影</span></a></div>
		<div><a href="/forum/kinkTie/其它"><span class="glyphicon glyphicon glyphicon-tags"></span><span>其它</span></a></div>
	@else
		<div><a href="/forum/tie"><span class="glyphicon glyphicon-inbox"></span><span>全部</span></a></div>
		<div><a href="/forum/tie/手机"><span class="glyphicon glyphicon-phone"></span><span>手机</span></a></div>
		<div><a href="/forum/tie/电脑"><span class="glyphicon glyphicon-floppy-open"></span><span>电脑</span></a></div>
		<div><a href="/forum/tie/平板"><span class="glyphicon glyphicon-phone"></span><span>平板</span></a></div>
		<div><a href="/forum/tie/资讯"><span class="glyphicon glyphicon-bullhorn"></span><span>资讯</span></a></div>
		<div><a href="/forum/tie/摄影"><span class="glyphicon glyphicon-camera"></span><span>摄影</span></a></div>
		<div><a href="/forum/tie/其它"><span class="glyphicon glyphicon glyphicon-tags"></span><span>其它</span></a></div>
	@endif
</div>
	<div class="forumTabDiv">
	@if ($params['isKinkTie'] == 0)
		<span class="checked"><a href="/forum/kinkTie">纠结帖子</a></span>
		<span><a href="/forum/tie">普通帖子</a></span>
	@else
		<span><a href="/forum/kinkTie">纠结帖子</a></span>
		<span class="checked"><a href="/forum/tie">普通帖子</a></span>
	@endif
	<span></span>
	<span>
		<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
	</span>
</div>