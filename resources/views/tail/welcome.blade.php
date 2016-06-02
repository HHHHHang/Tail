<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- jQuery -->
    <script src="{{URL::asset('js/jquery.js')}}"></script>

    <script src="{{asset('js/jquery.touchSwipe.min.js')}}"></script>
    <script src="{{asset('js/imagesloaded.min.js')}}" ></script>
    <!-- jQuery Sangar Slider -->
    <script src="{{asset('js/sangarSlider/sangarBaseClass.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarSetupLayout.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarSizeAndScale.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarShift.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarSetupBulletNav.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarSetupNavigation.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarSetupSwipeTouch.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarSetupTimer.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarBeforeAfter.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarLock.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarResponsiveClass.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarResetSlider.js')}}"></script>
    <script src="{{asset('js/sangarSlider/sangarTextbox.js')}}"></script>
    <script src="{{asset('js/sangarSlider.js')}}"></script>
    {{--<script src="{{asset('js/slider.js')}}"></script>--}}

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/search.js')}}"></script>


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/bootstrap/style.css') }}" rel="stylesheet" type="text/css" >

    <!-- sangarSlider Sangar Slider -->
    <link href="{{ asset('css/sangarSlider/normalize.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/sangarSlider/default.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/sangarSlider/sangarSlider.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/sangarSlider/sangarSliderDefault.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/sangarSlider/responsive.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="{{URL::asset('css/navigation.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/sidebar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/blog-home.css')}}" rel="stylesheet" type="text/css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="upperBody">

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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

    <!-- Slider -->
    <div class="htmleaf-container">

        <div class="htmleaf-content bgcolor-13">
            <div class='sangar-slideshow-container' id='sangar-example'>
                <div class='sangar-content-wrapper' style='display:none;'>
                    @foreach($params['pics'] as $pic)
                        <div class='sangar-content'><a href="/article"></a><img src={{$pic}} /></div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8 articlesDisplayDiv">
                @foreach($params['articles'] as $article)
					<div class="well articleDisplayDiv">
                        <div>
                            <img src="http://7xq64h.com1.z0.glb.clouddn.com/%E5%B1%8F%E5%B9%95%E5%BF%AB%E7%85%A7%202016-03-27%20%E4%B8%8A%E5%8D%884.45.04.png"   class="img-rounded img-circle img-responsive">
                            <span class="tie-head">测试用户</span>
                            <span></span>
                            <div>
                                <span><span class="glyphicon glyphicon-time"></span>{{ date("Y-m-d",strtotime($article->createTime)) }}</span>
                                <a href="#"><span class="glyphicon glyphicon-film"></span>{{ $article->type  }}</a>
                            </div>

                        </div>
                        <div>
                            <img class="img-responsive" src="{{ $article->image }}" alt="">
                        </div>
                        <div class="postHead"><a href="/article/{{ $article->id }}" class="title-phone">{{ $article->title  }}</a></div>
                        <div class="postContent"><p class="content-phone">{{ $article->content  }}</p></div>
                        <div>
                            <a href="#"><span class="glyphicon glyphicon-thumbs-up"></span>{{ $article->upNum }}</a>
                            <a href="#"><span class="glyphicon glyphicon-comment"></span>{{ $article->commentNum }}</a>
                        </div>
                    </div>
                @endforeach
                <ul class="pager">
                    <li class="previous disabled">
                        <a>上一页</a>
                    </li>
                    <li class="next disabled">
                        <a>下一页</a>
                    </li>
                </ul>
            </div>

            <div class="sidebarBlock col-md-4">

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

                <div class="well typeSidebarDiv">

                    <span>频道分类</span>
                    <div class="typeSidebar">
                        <div><a href="/forum"><span class="glyphicon glyphicon-inbox"></span><span>全部</span></a></div>
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
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div>
            <span>美好生活 从分享开始</span>
            <span>联系我们: xxx-xxxxxxx</span>
            <span>专业综合 组7</span>
            <span>同济大学 软件学院</span>
        </div>
    </footer>

    <script type='text/javascript'>
        var data = <?php echo $params['picsArr'];?>;
        jQuery(document).ready(function($) {
            /**
             * identifier variable must be unique ID
             */
            var sangar = $('#sangar-example').sangarSlider({
                timer :  true, // true or false to have the timer
                pagination : 'content-horizontal', // bullet, content, none
                paginationContent:data,
                paginationContentType : 'image', // text, image
                paginationContentWidth : 155, // pagination content width in pixel
                paginationImageHeight : 110, // pagination image height
                width : 1200, // slideshow width
                height : 420, // slideshow height
                fixedHeight: true,
                scaleSlide : false // slider will scale to the container size
            });
        })
    </script>
</body>

</html>
