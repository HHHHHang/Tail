<div class="forumTypeDiv">
	<div class="checked"><a href="/forum"><span class="glyphicon glyphicon-inbox"></span><span>全部</span></a></div>
	<div><a href="/forum/手机"><span class="glyphicon glyphicon-phone"></span><span>手机</span></a></div>
	<div><a href="/forum/电影"><span class="glyphicon glyphicon-floppy-open"></span><span>电脑</span></a></div>
	<div><a href="/forum/平板"><span class="glyphicon glyphicon-phone"></span><span>平板</span></a></div>
	<div><a href="/forum/资讯"><span class="glyphicon glyphicon-bullhorn"></span><span>资讯</span></a></div>
	<div><a href="/forum/周边"><span class="glyphicon glyphicon-send"></span><span>周边</span></a></div>
	<div><a href="/forum/其它"><span class="glyphicon glyphicon glyphicon-tags"></span><span>其它</span></a></div>
</div>
	<div class="forumTabDiv">
	@if ($params['isKinkTie'] == 0)
		<span class="checked"><a href="/forum/kinkTie">纠结帖子</a></span>
		<span><a href="/forum/tie">普通帖子</a></span>
	@else
		<span><a href="/forum/kinkTie">纠结文章</a></span>
		<span class="checked"><a href="/forum/tie">普通帖子</a></span>
	@endif
	<span></span>
	<span>
		<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">排序方法 <span class="caret"></span></a>
		<ul class="dropdown-menu dropdown-menu-right">
			<li><a href="#">按时间顺序</a></li>
			<li><a href="#">按热门顺序</a></li>
		</ul>
	</span>
</div>