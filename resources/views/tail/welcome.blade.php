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
                        <div class='sangar-content'><a href="/article"></a><img src={{$pic}} /></div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="htmleaf-container topicDisplayDiv">
        <div class="container">
            <div class="row topicDisplayMain">
                <div>
                    <h1>推荐话题</h1><span></span><a>进入话题广场</a>
                </div>
                <div>
                    <div class="thumbnailCustom">
                        <img src="http://s.dgtle.com/forum/201606/16/161917pyuda21rr342504r.jpg?szhdl=imageview/2/w/960"/>
                        <div>
                            <h4>一加手机</h4>
                            <h5>不泯然的国产手机 Android旗舰</h5>
                        </div>
                    </div>
                    <div></div>
                    <div class="thumbnailCustom">
                        <img src="http://s.dgtle.com/forum/201606/16/161920yb1buv4cc2ib1c6c.jpg?szhdl=imageview/2/w/960"/>
                        <div>
                            <h4>一加手机</h4>
                            <h5>不泯然的国产手机 Android旗舰</h5>
                        </div>
                    </div>
                    <div></div>
                    <div class="thumbnailCustom">
                        <img src="http://s.dgtle.com/forum/201606/15/164616ghs9gcyoyssvcu9s.jpg?szhdl=imageview/2/w/680"/>
                        <div>
                            <h4>一加手机</h4>
                            <h5>不泯然的国产手机 Android旗舰</h5>
                        </div>
                    </div>
                    <div></div>
                    <div class="thumbnailCustom">
                        <img src="http://s.dgtle.com/forum/201606/15/164821l4zm4q5qv85jzs56.jpg?szhdl=imageview/2/w/680"/>
                        <div>
                            <h4>一加手机</h4>
                            <h5>不泯然的国产手机 Android旗舰</h5>
                        </div>
                    </div>
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

                @include('tail.layout.searchBar')

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

                <div class="popularTopicSidebar well">
                    <span>热门话题</span>
                    <div style="background-image:url(http://s.dgtle.com/forum/201606/16/161917pyuda21rr342504r.jpg?szhdl=imageview/2/w/960)">
                        <div>
                            <span><b>一加手机</b></span>
                            <span>不泯然的国产手机 Android旗舰</span>
                        </div>
                    </div>
                    <div style="background-image:url(http://s.dgtle.com/forum/201606/16/161920yb1buv4cc2ib1c6c.jpg?szhdl=imageview/2/w/960)">
                        <div>
                            <span><b>一加手机</b></span>
                            <span>不泯然的国产手机 Android旗舰</span>
                        </div>
                    </div>
                    <div style="background-image:url(http://s.dgtle.com/forum/201606/15/164616ghs9gcyoyssvcu9s.jpg?szhdl=imageview/2/w/680)">
                        <div>
                            <span><b>一加手机</b></span>
                            <span>不泯然的国产手机 Android旗舰</span>
                        </div>
                    </div>
                </div>
                <div class="popularForumSidebar well">
                    <span>热门帖子</span>
                    <div>
                        <h5>英语写作小技巧3英语写作小技巧3</h5>
                        <p>2016-06-16 英语</p>
                    </div>
                    <div>
                        <h5>英语写作小技巧2英语写作小技巧3</h5>
                        <p>2016-06-16 英语</p>
                    </div>
                    <div>
                        <h5>英语写作小技巧1</h5>
                        <p>2016-06-16 英语</p>
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
