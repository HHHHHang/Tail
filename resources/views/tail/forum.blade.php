
<!DOCTYPE html>
<html lang="en">

<head>

    @include('tail.layout.lib')
    <script src="{{URL::asset('js/search.js')}}"></script>

    <link href="{{URL::asset('css/navigation.css')}}" rel="stylesheet" type="text/css" />
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
                    @foreach($params['banner'] as $banner)
                    <div class="recommendationItem" style="background-image:url({{$banner->file}})">
                        <div onclick="window.location.href='{{$banner->href}}'">
                            <a  style="color:white"">
                            <h4>{{$banner->title}}</h4>
                            </a>
                            <h5>{{$banner->content}}</h5>
                        </div>
                    </div>
                    <div></div>
                    @endforeach
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
                @foreach($params['test'] as $testBanner)
                    <div class="recommendationItem" style="background-image:url({{$testBanner->file}})">
                        <div onclick="window.location.href='{{$banner->href}}'">
                            <a style="color:white">
                            <h4>{{$testBanner->title}}</h4>
                            </a>
                            <h5>{{$testBanner->content}}</h5>
                        </div>
                    </div>
                    <div></div>
                @endforeach
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
                            <div {{$params['type']=="all"?"class=checked":''}}><a href="/forum/all"><span class="glyphicon glyphicon-inbox"></span><span>全部</span></a></div>
                            <div {{$params['type']=="手机"?"class=checked":''}}><a href="/forum/手机"><span class="glyphicon glyphicon-phone"></span><span>手机</span></a></div>
                            <div {{$params['type']=="摄影"?"class=checked":''}}><a href="/forum/摄影"><span class="glyphicon glyphicon-camera"></span><span>摄影</span></a></div>
                            <div {{$params['type']=="电脑"?"class=checked":''}}><a href="/forum/电脑"><span class="glyphicon glyphicon-floppy-open"></span><span>电脑</span></a></div>
                            <div {{$params['type']=="平板"?"class=checked":''}}><a href="/forum/平板"><span class="glyphicon glyphicon-phone"></span><span>平板</span></a></div>
                            <div {{$params['type']=="资讯"?"class=checked":''}}><a href="/forum/资讯"><span class="glyphicon glyphicon-bullhorn"></span><span>资讯</span></a></div>
                            <div {{$params['type']=="周边"?"class=checked":''}}><a href="/forum/周边"><span class="glyphicon glyphicon-send"></span><span>周边</span></a></div>
                            <div {{$params['type']=="其它"?"class=checked":''}}><a href="/forum/其它"><span class="glyphicon glyphicon glyphicon-tags"></span><span>其它</span></a></div>
                        </div>
                    </div>

                    <div>
                        <h5>添加筛选关键字</h5>
                        <form id="form" class="tagChoosingDiv" method="post" action="/forum/{{$params['type']}}/filter">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @foreach($params['hotTags'] as $tag)
                                <div class="checkbox">
                                <label>
                                    <input {{(isset($params['keywords'])) ? in_array($tag->name, $params['keywords']) ? "checked" : '' : ''}} name="tag" type="checkbox" value="{{$tag->name}}"> {{$tag->name}}
                                </label>
                                </div>
                            @endforeach


                        </form>
                        <div>
                            <button class="btn btn-default addKW" onclick="addKeyWord()">添加关键字</button>
                            <button  onclick="filter()" class="btn btn-default">筛选</button>
                        </div>


                    </div>
                </div>





                @foreach($params['articlesInfo'] as $articleInfo)
                    <div class="well articleDisplayDiv">
                        <div>
                            <img onclick="window.location.href='/otherInfo/{{ $articleInfo['article']->uid }}'" src="{{$articleInfo['avatar']}}"   class="img-rounded img-circle img-responsive">
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

                <!-- Blog Sidebar Widgets Column -->
            </div>
            <div class="sidebarBlock col-md-4">

				@if (isset($params['user']) && $params['user']['id'] != 2)
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
                @endif

                <div  data-spy="affix" data-offset-top="696" data-offset-bottom="340">

                    <div class="forumNewBtn">
                    @if (isset($params['user']) && $params['user']['id'] != 2)
                        <button type="button" class="btn" onclick="{location.href = '/new/article'}">发布文章</button>
                    @else
                    	<button type="button" class="btn" onclick="{location.href = '/login'}">发布请先登录</button>
                    @endif
                    </div>

                    <div class="popularTopicSidebar well">
                        <span>热门文章</span>
                        @foreach($params['side_banner'] as $banner)
                        <div style="background-image:url({{$banner->file}})">
                            <div onclick="window.location.href='{{$banner->href}}'">
                                <span><b>{{$banner->title}}</b></span>
                                <span>{{$banner->content}}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>


            </div>
        </div>
    </div>

    @include('tail.layout.footer')
</body>

</html>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var filter = function(){
        var src;

        var tagArr=new Array();
        $('input[name="tag"]:checked').each(function(){
            tagArr.push($(this).val());
        });
        if($( '#addtag' ).is( ":checked" )){
            if($('#newKeyword').val()!=''){
                tagArr.push($('#newKeyword').val());
            }

        }
        console.log(tagArr);
        var keywordsInput = document.createElement("input");
        // 设置相应参数
        keywordsInput.type = "hidden";
        keywordsInput.name = "keywords";
        keywordsInput.value = JSON.stringify(tagArr);
        var form = document.getElementById("form");
        form.appendChild(keywordsInput);
        form.submit();
//        $('.smalleForumTypeDiv > div').each(function () {
//            if($(this).attr("class")=="checked"){
//                src = $($(this).children(":first")).attr("href");
//                console.log(src);
//            }
//                }
//        )


//        $.ajax({
//            type: 'POST',
//            url: '/forum/filter',
//            data: {
//                keywords: tagArr,
//
//            },
//            dataType: 'json',
//            success: function (data) {
//                console.log(data);
//                console.log('success');
//
//            },
//            error: function (error) {
//                console.log(error);
//                console.log('error');
//            }
//        });



    }
    var addKeyWord = function(){
        console.log('add keyword');
        $('.tagChoosingDiv').append('<div class="checkbox">' +
                '<label>' +
                '<input id = "addtag" type="checkbox" checked value=""> <input type="text" autofocus value="" maxlength="10" id="newKeyword"> ' +
                '</label> ' +
                '</div>');

        $('.addKW').attr('disabled', 'true');

        $('#newKeyword').on('keydown', function (e) {
            var curKey = e.which;
            if (curKey == 13) {
                var newKeyWord = $('#newKeyword').val();
                $('#newKeyword').prev().val(newKeyWord);
                $('#newKeyword').parent().append(newKeyWord);
                $('#newKeyword').remove();

                $('.addKW')[0].removeAttribute('disabled');
            }
        });

    };


</script>
