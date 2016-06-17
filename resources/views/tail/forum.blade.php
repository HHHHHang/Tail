
<!DOCTYPE html>
<html lang="en">

<head>

    @include('tail.layout.lib')
    <script src="{{URL::asset('js/search.js')}}"></script>

    <link href="{{URL::asset('css/navigation.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/sidebar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/forum-home.css')}}" rel="stylesheet" type="text/css" />



    <title>数字良品-论坛</title>
</head>

<body>

	@include('tail.layout.header', ['active' => 'article'])

    <div class="htmleaf-container recommendationDiv">
        <div class="container">
            <div class="row recommendationMain">
                <div>
                    <h4>新品推荐</h4>
                </div>
                <div>
                    <div class="recommendationItem" style="background-image:url(http://s.dgtle.com/forum/201606/16/161917pyuda21rr342504r.jpg?szhdl=imageview/2/w/960)">
                        <div>
                            <h4>一加手机</h4>
                            <h5>不泯然的国产手机 Android旗舰</h5>
                        </div>
                    </div>
                    <div></div>
                    <div class="recommendationItem" style="background-image:url(http://s.dgtle.com/forum/201606/16/161920yb1buv4cc2ib1c6c.jpg?szhdl=imageview/2/w/960)">
                        <div>
                            <h4>一加手机</h4>
                            <h5>不泯然的国产手机 Android旗舰</h5>
                        </div>
                    </div>
                    <div></div>
                    <div class="recommendationItem" style="background-image:url(http://s.dgtle.com/forum/201606/15/164616ghs9gcyoyssvcu9s.jpg?szhdl=imageview/2/w/680)">
                        <div>
                            <h4>一加手机</h4>
                            <h5>不泯然的国产手机 Android旗舰</h5>
                        </div>
                    </div>
                    <div></div>
                    <div class="recommendationItem" style="background-image:url(http://s.dgtle.com/forum/201606/15/164821l4zm4q5qv85jzs56.jpg?szhdl=imageview/2/w/680)">
                        <div>
                            <h4>一加手机</h4>
                            <h5>不泯然的国产手机 Android旗舰</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="htmleaf-container recommendationDiv">
        <div class="container">
            <div class="row recommendationMain">
                <div>
                    <h4>开箱测评</h4>
                </div>
                <div>
                    <div class="recommendationItem" style="background-image:url(http://s.dgtle.com/forum/201606/16/161917pyuda21rr342504r.jpg?szhdl=imageview/2/w/960)">
                        <div>
                            <h4>开箱测评1</h4>
                            <h5>不泯然的国产手机 Android旗舰</h5>
                        </div>
                    </div>
                    <div></div>
                    <div class="recommendationItem" style="background-image:url(http://s.dgtle.com/forum/201606/16/161920yb1buv4cc2ib1c6c.jpg?szhdl=imageview/2/w/960)">
                        <div>
                            <h4>开箱测评1</h4>
                            <h5>不泯然的国产手机 Android旗舰</h5>
                        </div>
                    </div>
                    <div></div>
                    <div class="recommendationItem" style="background-image:url(http://s.dgtle.com/forum/201606/15/164616ghs9gcyoyssvcu9s.jpg?szhdl=imageview/2/w/680)">
                        <div>
                            <h4>开箱测评1</h4>
                            <h5>不泯然的国产手机 Android旗舰</h5>
                        </div>
                    </div>
                    <div></div>
                    <div class="recommendationItem" style="background-image:url(http://s.dgtle.com/forum/201606/15/164821l4zm4q5qv85jzs56.jpg?szhdl=imageview/2/w/680)">
                        <div>
                            <h4>开箱测评1</h4>
                            <h5>不泯然的国产手机 Android旗舰</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="forumLeftPart subNavigationLeftPart col-md-8">

                <div class="subNavigation">
                    <div>
                        <h5>选择频道</h5>
                        <div class="forumTypeDiv smalleForumTypeDiv">
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
                    </div>

                    <div>
                        <h5>添加筛选标签</h5>
                        <form class="tagChoosingDiv">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> 标签1
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> 标签2 adfa
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> 标签3 adfa
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> 标签4 asdfaw
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> 标签5 asdfawoefi
                                </label>
                            </div>
                        </form>
                        <button type="submit" class="btn btn-default">筛选</button>
                    </div>
                </div>





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

                <!-- Blog Sidebar Widgets Column -->
            </div>
            <div class="sidebarBlock col-md-4">

                <div class="well forumUserInfo">
                    <div>
                        <img width="90" height="90" src="{{ $params['user']['avatar'] }}"  class="img-responsive">
                        <span>{{ $params['user']['level'] }}</span>
                    </div>

                    <div>
                        <span>{{ $params['user']['name'] }}</span>
                        <div>
                            <a><span>{{ $params['user']['postNum'] }}</span><span>帖子</span></a>
                            <a><span>{{ $params['user']['commentNum'] }}</span><span>评论</span></a>
                            <a><span>{{ $params['user']['followNum'] }}</span><span>关注</span></a>
                        </div>
                    </div>
                </div>

                <div class="forumNewBtn">
                    <button type="button" class="btn" onclick="{location.href = '/new/forum'}">发布帖子</button>
                </div>

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

                <div class="popularTopicSidebar well">
                    <span>热门文章</span>
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



            </div>
        </div>
    </div>

    @include('tail.layout.footer')
</body>

</html>
