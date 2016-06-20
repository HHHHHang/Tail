<!DOCTYPE html>
<html lang="en">
<head>
	@include('tail.layout.lib')

</head>
<body class="upperBody">

    @include('tail.layout.header', ['active' => 'index'])

    <!-- Slider -->
    <div class="htmleaf-container">

        <div class="htmleaf-content bgcolor-13">
            <div class='sangar-slideshow-container' id='sangar-example'>
                <div class='sangar-content-wrapper' style='display:none;'>
                    @foreach($params['pics'] as $pic)
                        <div class='sangar-content'><a href="{{$pic->href}}"></a><img src={{$pic->file}} /></div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <div class="htmleaf-container recommendationDiv">
        <div class="container">
            <div class="row recommendationMain">
                <div>
                    <h1>推荐话题</h1><span></span><a href="/topic">进入话题广场</a>
                </div>
                <div>
                    @foreach($params['banner'] as $banner)
                        <div class="recommendationItem" style="background-image:url({{$banner->file}})">
                            <div onclick="window.location.href='{{$banner->href}}'">
                                <h4>{{$banner->title}}</h4>
                                <h5>{{$banner->content}}</h5>
                            </div>
                        </div>
                        <div></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h1>热门文章</h1>
            </div>
            <!-- Blog Entries Column -->
            <div class="col-md-8 articlesDisplayDiv">
                @foreach($params['articleInfo'] as $articleInfo)
					<div class="well articleDisplayDiv">
                        <div>
                            <img  onclick="window.location.href='/otherInfo/{{ $articleInfo['article']->uid }}'" src="{{$articleInfo['avatar']}}"   class="img-rounded img-circle img-responsive">
                            <span class="tie-head">{{ $articleInfo['name'] }}</span>
                            <span></span>
                            <div>
                                <span><span class="glyphicon glyphicon-time"></span>{{ date("Y-m-d",strtotime($articleInfo['article']->createTime)) }}</span>
                                <a href="#"><span class="glyphicon glyphicon-film"></span>{{ $articleInfo['article']->type  }}</a>
                            </div>

                        </div>
                        <div>
                            <img class="img-responsive" src="{{ $articleInfo['article']->image }}" alt="">
                        </div>
                        <div class="postHead"><a href="/article/{{ $articleInfo['article']->id }}" class="title-phone">{{ $articleInfo['article']->title  }}</a></div>
                        <div>
                            <a href="javascript:void(0)"><span class="glyphicon glyphicon-thumbs-up"></span>{{ $articleInfo['article']->upNum }}</a>
                            <a href="javascript:void(0)"><span class="glyphicon glyphicon-comment"></span>{{ $articleInfo['article']->commentNum }}</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="sidebarBlock col-md-4">

                <div class="well typeSidebarDiv">

                    <span>频道分类</span>
                    <div class="typeSidebar">
                        <div><a href="/forum"><span class="glyphicon glyphicon-inbox"></span><span>全部</span></a></div>
                        <div><a href="/forum/手机"><span class="glyphicon glyphicon-phone"></span><span>手机</span></a></div>
                        <div><a href="/forum/电影"><span class="glyphicon glyphicon-floppy-open"></span><span>电脑</span></a></div>
                        <div><a href="/forum/平板"><span class="glyphicon glyphicon-phone"></span><span>平板</span></a></div>
                        <div><a href="/forum/资讯"><span class="glyphicon glyphicon-bullhorn"></span><span>资讯</span></a></div>
                        <div><a href="/forum/周边"><span class="glyphicon glyphicon-send"></span><span>周边</span></a></div>
                        <div><a href="/forum/其它"><span class="glyphicon glyphicon glyphicon-tags"></span><span>其它</span></a></div>
                    </div>
                </div>

                <div  data-spy="affix" data-offset-top="1261" data-offset-bottom="340">
                    <div class="popularTopicSidebar well">
                        <div>
                            <span>推荐话题</span><span></span><a href="/topic">进入话题广场</a>
                        </div>
                        @foreach($params['side_banner']  as $banner)
                            <div style="background-image:url({{ $banner->file }})">
                                <div onclick="window.location.href='{{$banner->href}}'">
                                    <span><b>{{ $banner->title }}</b></span>
                                    <span>{{ $banner->content }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="popularForumSidebar well">
                        <div>
                            <span>推荐帖子</span><span></span><a href="/forum/kinkTie">进入论坛</a>
                        </div>
                        @foreach($params['hot'] as $tie)
                            <div>
                                <a href="/kinkTie/{{$tie->kid}}">
                                    <h5>{{ $tie->title }}</h5>
                                </a>
                                <p>{{ date('Y-m-d', $tie->createTime)  }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>


            </div>

        </div>

    </div>
    <!-- /.container -->

    @include('tail.layout.footer')

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
