<!DOCTYPE html>
<html lang="en">
<head>
	@include('tail.layout.lib')
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="{{ asset('topics/css/style.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('topics/css/jquery.jscrollpane.css') }}" rel="stylesheet" type="text/css">
	<link href='http://fonts.useso.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
	<link href='http://fonts.useso.com/css?family=Oswald' rel='stylesheet' type='text/css' />
	<link href='http://fonts.useso.com/css?family=Ovo' rel='stylesheet' type='text/css' />
	<script id="fullviewTmpl" type="text/x-jquery-tmpl">
		@{{html bgimage}}
		<div class="full-view" style="margin-top: 80px">
			<span class="full-view-exit">Exit full screen view</span>
			<div class="header">
				<h2 class="title">${title}</h2>
				<div class="full-nav">
					<span class="full-nav-prev">Previous</span>
					<span class="full-nav-pages">
						<span class="full-nav-current">${current}</span>/
						<span class="full-nav-total">${total}</span>
					</span>
					<span class="full-nav-next">Next</span>
				</div>
				<p class="subline">${subline}</p>
				<span class="loading-small"></span>
			</div>
			<div class="project-descr-full">
				<div class="thumbs-wrapper"><div class="thumbs">@{{html thumbs}}</div></div>
				<div class="project-descr-full-wrapper">
					<div class="project-descr-full-content">@{{html description}}</div><!-- project-descr-full-content -->
				</div>
			</div><!-- project-descr-full -->
		</div><!-- full-view -->
	</script>

</head>
<body >

	<nav class="navbar navbar-default navbar-fixed-top" style="height: 50px" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">数字良品</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="/">首页</a></li>
					<li class="dropdown">
						<a href="/forum" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">论坛 <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/forum">精选文章</a></li>
							<li role="separator" class="divider"></li>
							<li class="dropdown-header">帖子专区</li>
							<li><a href="/forum/tie">纠结帖子</a></li>
							<li><a href="#">其它帖子</a></li>
						</ul>
					</li>
					<li><a href="/search/article">搜索</a></li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if (isset($params['user']))
						<li><a href="/myinfo?name={{ $params['user']['name'] }}">{{  $params['user']['name'] }}</a></li>
						<li><a href="/logout">退出</a></li>
					@else
						<li><a href="/login">登录</a></li>
						<li><a href="/login">注册</a></li>
					@endif
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<div class="left-side">
		{{--<h1><span>&hearts;</span> 话题广场</h1>--}}
		<h1>话题广场</h1>
		<h2>让思想汇聚、流传</h2>
		<a class="btn btn-large btn-success create-topic"><span class="glyphicon glyphicon-pencil"></span>新建话题</a>
		<p class="subline">share <span class="fancy">&amp;</span> more</p>
	</div>
	<div class="container topic-container" id="container">
			<div class="item block" data-bgimage="{{ asset('topics/images/thumbs/1.jpg') }}">
				<div class="thumbs-wrapper">
					<div class="thumbs">
						<img src="{{ asset('topics/images/thumbs/1.jpg') }}"/>
						<img src="{{ asset('topics/images/thumbs/2.jpg') }}"/>
					</div>
				</div>
				<a href="/topic/detail"><h2 class="title">话题名称</h2></a>
				<p class="subline">描述 <span class="fancy">&amp;</span> 具体信息</p>
				<div class="intro">
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. <a href="#" class="more_link">查看话题描述</a></p>
				</div>
				<div class="project-descr">
					<p>O my friend - but it is too much for my strength - I sink under the weight of the splendour of these visions!</p>
					<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.</p>
				</div>
			</div>
			<div class="item block" data-bgimage="{{ asset('topics/images/thumbs/1.jpg') }}">
				<div class="thumbs-wrapper">
					<div class="thumbs">
						<img src="{{ asset('topics/images/thumbs/1.jpg') }}"/>
						<img src="{{ asset('topics/images/thumbs/2.jpg') }}"/>
					</div>
				</div>
				<a href="/topic/detail"><h2 class="title">话题名称</h2></a>
				<p class="subline">描述 <span class="fancy">&amp;</span> 具体信息</p>
				<div class="intro">
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. <a href="#" class="more_link">查看话题描述</a></p>
				</div>
				<div class="project-descr">
					<p>O my friend - but it is too much for my strength - I sink under the weight of the splendour of these visions!</p>
					<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.</p>
				</div>
			</div>
			<div class="item block" data-bgimage="{{ asset('topics/images/thumbs/1.jpg') }}">
				<div class="thumbs-wrapper">
					<div class="thumbs">
						<img src="{{ asset('topics/images/thumbs/1.jpg') }}"/>
						<img src="{{ asset('topics/images/thumbs/2.jpg') }}"/>
					</div>
				</div>
				<a href="/topic/detail"><h2 class="title">话题名称</h2></a>
				<p class="subline">描述 <span class="fancy">&amp;</span> 具体信息</p>
				<div class="intro">
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. <a href="#" class="more_link">查看话题描述</a></p>
				</div>
				<div class="project-descr">
					<p>O my friend - but it is too much for my strength - I sink under the weight of the splendour of these visions!</p>
					<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.</p>
				</div>
			</div>
			<div class="item block" data-bgimage="{{ asset('topics/images/thumbs/1.jpg') }}">
				<div class="thumbs-wrapper">
					<div class="thumbs">
						<img src="{{ asset('topics/images/thumbs/1.jpg') }}"/>
						<img src="{{ asset('topics/images/thumbs/2.jpg') }}"/>
					</div>
				</div>
				<a href="/topic/detail"><h2 class="title">话题名称</h2></a>
				<p class="subline">描述 <span class="fancy">&amp;</span> 具体信息</p>
				<div class="intro">
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. <a href="#" class="more_link">查看话题描述</a></p>
				</div>
				<div class="project-descr">
					<p>O my friend - but it is too much for my strength - I sink under the weight of the splendour of these visions!</p>
					<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.</p>
				</div>
			</div>
			<div class="item block" data-bgimage="{{ asset('topics/images/thumbs/1.jpg') }}">
				<div class="thumbs-wrapper">
					<div class="thumbs">
						<img src="{{ asset('topics/images/thumbs/1.jpg') }}"/>
						<img src="{{ asset('topics/images/thumbs/2.jpg') }}"/>
					</div>
				</div>
				<a href="/topic/detail"><h2 class="title">话题名称</h2></a>
				<p class="subline">描述 <span class="fancy">&amp;</span> 具体信息</p>
				<div class="intro">
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. <a href="#" class="more_link">查看话题描述</a></p>
				</div>
				<div class="project-descr">
					<p>O my friend - but it is too much for my strength - I sink under the weight of the splendour of these visions!</p>
					<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.</p>
				</div>
			</div>
			<div class="item block" data-bgimage="{{ asset('topics/images/thumbs/1.jpg') }}">
				<div class="thumbs-wrapper">
					<div class="thumbs">
						<img src="{{ asset('topics/images/thumbs/1.jpg') }}"/>
						<img src="{{ asset('topics/images/thumbs/2.jpg') }}"/>
					</div>
				</div>
				<a href="/topic/detail"><h2 class="title">话题名称</h2></a>
				<p class="subline">描述 <span class="fancy">&amp;</span> 具体信息</p>
				<div class="intro">
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. <a href="#" class="more_link">查看话题描述</a></p>
				</div>
				<div class="project-descr">
					<p>O my friend - but it is too much for my strength - I sink under the weight of the splendour of these visions!</p>
					<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.</p>
				</div>
			</div>
			<div class="item block" data-bgimage="{{ asset('topics/images/thumbs/1.jpg') }}">
				<div class="thumbs-wrapper">
					<div class="thumbs">
						<img src="{{ asset('topics/images/thumbs/1.jpg') }}"/>
						<img src="{{ asset('topics/images/thumbs/2.jpg') }}"/>
					</div>
				</div>
				<a href="/topic/detail"><h2 class="title">话题名称</h2></a>
				<p class="subline">描述 <span class="fancy">&amp;</span> 具体信息</p>
				<div class="intro">
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. <a href="#" class="more_link">查看话题描述</a></p>
				</div>
				<div class="project-descr">
					<p>O my friend - but it is too much for my strength - I sink under the weight of the splendour of these visions!</p>
					<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.</p>
				</div>
			</div>
			<div class="item block" data-bgimage="{{ asset('topics/images/thumbs/1.jpg') }}">
				<div class="thumbs-wrapper">
					<div class="thumbs">
						<img src="{{ asset('topics/images/thumbs/1.jpg') }}"/>
						<img src="{{ asset('topics/images/thumbs/2.jpg') }}"/>
					</div>
				</div>
				<a href="/topic/detail"><h2 class="title">话题名称</h2></a>
				<p class="subline">描述 <span class="fancy">&amp;</span> 具体信息</p>
				<div class="intro">
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. <a href="#" class="more_link">查看话题描述</a></p>
				</div>
				<div class="project-descr">
					<p>O my friend - but it is too much for my strength - I sink under the weight of the splendour of these visions!</p>
					<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.</p>
				</div>
			</div>
			<div class="item block" data-bgimage="{{ asset('topics/images/thumbs/1.jpg') }}">
				<div class="thumbs-wrapper">
					<div class="thumbs">
						<img src="{{ asset('topics/images/thumbs/1.jpg') }}"/>
						<img src="{{ asset('topics/images/thumbs/2.jpg') }}"/>
					</div>
				</div>
				<a href="/topic/detail"><h2 class="title">话题名称</h2></a>
				<p class="subline">描述 <span class="fancy">&amp;</span> 具体信息</p>
				<div class="intro">
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. <a href="#" class="more_link">查看话题描述</a></p>
				</div>
				<div class="project-descr">
					<p>O my friend - but it is too much for my strength - I sink under the weight of the splendour of these visions!</p>
					<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.</p>
				</div>
			</div>
			<div class="item block" data-bgimage="{{ asset('topics/images/thumbs/1.jpg') }}">
				<div class="thumbs-wrapper">
					<div class="thumbs">
						<img src="{{ asset('topics/images/thumbs/1.jpg') }}"/>
						<img src="{{ asset('topics/images/thumbs/2.jpg') }}"/>
					</div>
				</div>
				<a href="/topic/detail"><h2 class="title">话题名称</h2></a>
				<p class="subline">描述 <span class="fancy">&amp;</span> 具体信息</p>
				<div class="intro">
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. <a href="#" class="more_link">查看话题描述</a></p>
				</div>
				<div class="project-descr">
					<p>O my friend - but it is too much for my strength - I sink under the weight of the splendour of these visions!</p>
					<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
					<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.</p>
				</div>
			</div>
			<div class="clr"></div>


	</div>

	<!-- container -->


	<script type="text/javascript" src="http://libs.useso.com/js/jquery/1.6.2/jquery.min.js"></script>
	<script src="{{asset('topics/js/jquery.tmpl.min.js')}}"></script>
	<script src="{{asset('topics/js/jquery.easing.1.3.js')}}"></script>
	<script src="{{asset('topics/js/jquery.mousewheel.js')}}"></script>
	<script src="{{asset('topics/js/jquery.jscrollpane.min.js')}}"></script>
	<script src="{{asset('topics/js/jquery.masonry.min.js')}}"></script>
	<script src="{{asset('topics/js/jquery.gpCarousel.js')}}"></script>
	<script type="text/javascript">
		$(window).load(function(){

				// the main container
			var $GPContainer	= $('#container'),
				// the articles (the thumbs)
				$articles		= $GPContainer.children('div.block'),
				// total number of articles
				totalArticles	= $articles.length,
				// the fullview container
				$fullview		= $('<div id="fullview" class="full-view-elements"></div>').prependTo( $('body') ),
				// the overlay
				$overlay		= $('<div class="overlay"></div>').prependTo( $('body') ),

				GridPortfolio	= (function() {
						// current will be the index of the current article
					var animspeed				= 500,
						animeasing				= 'jswing', // try easeOutExpo
						current					= -1,
						// indicates if certain elements can be animated or not at a given time
						animrun					= false,
						init 					= function() {
							initPlugins();
							initEventsHandler();
						},
						// builds each article's carousel
						// initiallizes the mansory
						initPlugins				= function() {
							// apply carousel functionality to the thumbs-wrapper in each article
							$articles.find('div.thumbs-wrapper').gpCarousel();

							// apply mansory to the grid items
							$GPContainer.masonry({
								itemSelector	: '.item',
								columnWidth		: 5,
								isAnimated		: true
							});
						},
						// events
						initEventsHandler		= function() {
							// switch to fullview when we click the "View Project" link
							$articles.each( function(i) {
								$(this).find('a.more_link').bind('click.GridPortfolio', function(e) {

									if( animrun ) return false;
									animrun			= true;

									var $article	= $(this).closest('div.block');
									// update the current value
									current	= $article.index('.block');
									// hide scrollbar
									$('body').css( 'overflow', 'hidden' );
									// preload the fullview image and then start the animation (showArticle)
									var $intro		= $article.find('div.intro');
									$intro.addClass('intro-loading');
									$('<img/>').load(function() {
										$intro.removeClass('intro-loading');
										showArticle( $article, true );
										animrun	= false;
									}).attr('src', $article.data('bgimage'));

									return false;
								});
							});

							// fullview navigation
							$('#fullview').find('span.full-nav-next').live('click.GridPortfolio', function(e) {
								if( animrun ) return false;
								animrun	= true;

								// circular navigation
								if( current === totalArticles - 1 )
									current = 0
								else
									++current;
								// update the fullview current articles number
								$fullview.find('span.full-nav-current').html( current + 1 );

								showFullviewArticle();
							});
							$('#fullview').find('span.full-nav-prev').live('click.GridPortfolio', function(e) {
								if( animrun ) return false;
								animrun	= true;

								// circular navigation
								if( current === 0 )
									current = totalArticles - 1
								else
									--current;
								// update the fullview current articles number
								$fullview.find('span.full-nav-current').html( current + 1 );

								showFullviewArticle();
							});

							// switch to thumbs view
							$('#fullview').find('span.full-view-exit').live('click.GridPortfolio', function(e) {
								var $article	= $articles.eq( current );
								hideArticle( $article );
							});

							// window resize
							// center the background image if in fullview
							// reinitialise jscrollpane
							$(window).bind('resize.GridPortfolio', function(e) {
								var $bgimage	= $fullview.find('img.bg-img');
								if( $bgimage.length )
									centerBgImage( $bgimage );

								$fullview.find('div.project-descr-full-wrapper').jScrollPane('reinitialise');
							});
						},
						// the clicked article will be cloned;
						// the clone will be positioned on top of the cloned article;
						// remove every element from the clone except the thumbs wrapper (basically the image);
						// enlarge the clone to the window's width & height;
						// move the thumbs wrapper to the position where the fullview's thumbs wrapper will be placed;
						// at the same time fade in the overlay;
						// build the fullview panel with the right data (template)
						// remove the clone

						// this function will also be used when we close the fullview article. In this case,
						// the difference is that we don't animate the values (just set the css values), and the clone is not removed, since we
						// will use it for the animation (back to the thumb position)
						showArticle				= function( $article, anim ) {
							// clone the article
							var	$clone	= $article.clone().css({
								left	: $article.offset().left + 'px',
								top		: $article.offset().top + 'px',
								zIndex	: 1001,
								margin	: '0px',
								height	: $article.height() + 'px'
							}).attr( 'id', 'article-clone' );

							// this is the images container which is going to "fly" down
							var $thumbsWrapper	= $clone.find('div.thumbs-wrapper');

							// remove unnecessary elements from the clone
							$clone.children().not($thumbsWrapper).remove();
							$clone.find('div.thumbs-nav').remove();

							// position the clone on top of the article with the right css style
							var padding	= 20 + 20;
							// animate?
							$.fn.applyStyle = ( anim ) ? $.fn.animate : $.fn.css;

							var clonestyle 	= {
								width	: $(window).width() - padding + 'px',
								height	: $(window).height() - padding + 'px',
								left	: '0px',
								top		: $(window).scrollTop() + 'px'
							};

							$clone.appendTo( $('body') ).stop().applyStyle( clonestyle, $.extend( true, [], { duration : animspeed, easing : animeasing, complete : function() {
								// show the panel (it will be hidden behing the clone though, until this one is removed)
								$fullview.show()

								// use the template "fullviewTmpl" to build the fullview panel with the right data
								var articleFullviewData		= getArticleFullviewData($article);
								articleFullviewData.current	= current + 1;
								articleFullviewData.total	= totalArticles;
								var $fullview_content	= $('#fullviewTmpl').tmpl( articleFullviewData );

								$fullview_content.appendTo( $fullview );

								// call the gpCarousel plugin on the fullview thumbs-wrapper
								$fullview_content.find('div.thumbs-wrapper').gpCarousel({
									start	: $article.find('div.thumbs-wrapper').data('currentImage')
								});

								//jscrollpane
								$fullview_content.find('div.project-descr-full-wrapper').jScrollPane('destroy').jScrollPane({
									verticalDragMinHeight: 40,
									verticalDragMaxHeight: 40
								});

								// center bg image
								console.log( $fullview.find('img.bg-img') )
								centerBgImage( $fullview.find('img.bg-img') );

								// fade out overlay
								$overlay.stop().css( 'opacity', 0 );

								// fade out clone to show the fullview panel. After that remove the clone
								$clone.fadeOut( 300, function() { $clone.remove(); } );
							}}));

							// animate the images container to the position where is going to be on fullview
							var thumbsstyle 	= {
								left	: $(window).width() - $thumbsWrapper.width() - 25 + 'px',  // 25 is the margin left / right of the fullview thumbs-wrapper
								top		: ($(window).height() / 2) - ($thumbsWrapper.height() / 2) - 22 + 'px' // 10 is the margin top / bottom of the fullview thumbs-wrapper
							};
							$thumbsWrapper.stop().applyStyle( thumbsstyle, $.extend( true, [], { duration : animspeed, easing : animeasing} ) );

							// fade in overlay
							( anim ) ? $overlay.show().fadeTo( animspeed, 0.7, animeasing ) : $overlay.show().css( 'opacity', 0.7 );
						},
						// close the fullview
						hideArticle				= function( $article ) {
							// create the article's clone. the second argument is false to prevent the clone to be removed
							showArticle( $article, false );
							// hide the overlay for now
							$overlay.hide();
							// reference to the created clone and its thumbs wrapper
							var $clone			= $('#article-clone'),
								$thumbsWrapper	= $clone.find('div.thumbs-wrapper');
							// fade in the clone
							$clone.hide().fadeIn( 200, function() {
								// remove the contents of the fullview container
								$fullview.empty();
								// animate the clone to the article position and size
								$(this).animate({
									left	: $article.offset().left + 'px',
									top		: $article.offset().top + 'px',
									width	: $article.width() + 'px',
									height	: $article.height() + 'px'
								}, animspeed, animeasing, function() {
									// remove the clone
									$clone.remove();
									// show the scrollbar
									$('body').css( 'overflow', 'visible' );
								});

								// animate the clone's thumbs wrapper so it moves to the article's thumbs wrapper position
								$thumbsWrapper.animate({
									left	: '0px',
									top		: '0px'
								}, animspeed, animeasing);

								// fade out the overlay
								$overlay.show().fadeTo( animspeed, 0, animeasing, function() { $overlay.hide() } );
							});
						},
						// gets the article's necessary info to build the fullview panel
						getArticleFullviewData	= function( $article ) {
							return {
								bgimage			: '<img src="' + $article.data('bgimage') + '" class="bg-img"></img>',
								title 			: $article.find('h2.title').text(),
								thumbs			: $article.find('div.thumbs').html(),
								subline			: $article.find('p.subline').text(),
								description		: $article.find('div.project-descr').html()
							}
						},
						// used when navigating in fullview
						// needs to get the next / previous article's info
						showFullviewArticle		= function() {
							var $article					= $articles.eq( current ),
								articleFullviewData			= getArticleFullviewData($article),

								$loading					= $fullview.find('span.loading-small'),

								$fullviewImage				= $fullview.find('img.bg-img'),

								$fullviewTitle				= $fullview.find('h2.title'),

								$fullviewSubline			= $fullview.find('p.subline'),

								$fullviewDescriptionWrapper	= $fullview.find('div.project-descr-full-wrapper'),
								$fullviewDescription		= $fullviewDescriptionWrapper.find('div.project-descr-full-content'),

								$fullviewProjectDescrFull	= $fullview.find('div.project-descr-full'),
								$fullviewThumbsWrapper		= $fullviewProjectDescrFull.find('div.thumbs-wrapper'),
								$newFullviewThumbsWrapper	= $('<div class="thumbs-wrapper"><div class="thumbs">' + articleFullviewData.thumbs + '</div></div>');

							// preload the article's background image
							$loading.show();
							$( articleFullviewData.bgimage ).load(function() {
								$loading.hide();
								var $bgImage	= $(this);
								$bgImage.insertBefore( $fullviewImage );
								// center the bg image
								centerBgImage( $bgImage );
								$fullviewImage.remove();

								$fullviewTitle.html( articleFullviewData.title );

								$fullviewSubline.html( articleFullviewData.subline );

								$fullviewDescriptionWrapper.jScrollPane('destroy');
								$fullviewDescription.html( articleFullviewData.description );
								$fullviewDescriptionWrapper.jScrollPane('destroy').jScrollPane({
									verticalDragMinHeight: 40,
									verticalDragMaxHeight: 40
								});

								$fullviewThumbsWrapper.remove();
								$fullviewProjectDescrFull.prepend( $newFullviewThumbsWrapper );
								$newFullviewThumbsWrapper.gpCarousel();

								animrun	= false;
							}).attr('src', $article.data('bgimage'));

						},
						// centers the background image
						centerBgImage			= function( $img ) {
							var dim	= getImageDim($img);
							//set the returned values and show the image
							$img.css({
								width	: dim.width + 'px',
								height	: dim.height + 'px',
								left	: dim.left + 'px',
								top		: dim.top + 'px'
							});
						},
						//get dimentions of the image,
						//in order to make it full size and centered
						getImageDim				= function($i) {
							var $img     = new Image();
							$img.src     = $i.attr('src');

							var w_w	= $(window).width(),
							w_h	= $(window).height(),
							r_w	= w_h / w_w,
							i_w	= $img.width,
							i_h	= $img.height,
							r_i	= i_h / i_w,
							new_w,new_h,
							new_left,new_top;

							if(r_w > r_i){
								new_h	= w_h;
								new_w	= w_h / r_i;
							}
							else{
								new_h	= w_w * r_i;
								new_w	= w_w;
							}

							return {
								width	: new_w,
								height	: new_h,
								left	: (w_w - new_w) / 2,
								top		: (w_h - new_h) / 2
							};

						};

					return {
						init	: init
					};

				})()

			GridPortfolio.init();

		});
	</script>

</body>

</html>
