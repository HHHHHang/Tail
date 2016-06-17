<!DOCTYPE html>
<html lang="en">
<head>
	@include('tail.layout.lib')
    <link href ={{asset("css/topic-detail.css")}} rel="stylesheet" type="text/css" />
</head>
<body style="background-color: white ">

    @include('tail.layout.header', ['active' => ''])

    <!-- Page Content -->
    <div >


        <div class="top-pic " style="background-image: url('http://s.dgtle.com/portal/201606/16/103437jl5lsrsisfcfswal.jpg?szhdl=imageview/2/w/1900')">
            <div class="back" >
                <a href="/topic"><span class="glyphicon glyphicon-chevron-left"></span> 话题广场</a>
            </div>
            <div class="topic-name" ><h1>{{$params['topic']->name}}</h1></div>

        </div>

        <div class="article-list">

            <ul class="article-item">
                <li class = "have-img">
                    <a class="wrap-img">
                        <img src="/">
                    </a>
                    <div class=" article-info">
                        <div class="info-top">
                            <a class = "blue-link"> 测试用户 </a>
                            <em>·</em>
                            <span>7分钟前</span>
                        </div>
                        <h4 class="title">
                            <a href="/">
                                随波逐流hhh
                            </a>
                        </h4>
                        <div class="info-footer">
                            <span>阅读</span>
                            <span>评论</span>
                        </div>

                    </div>
                </li>

                <li class = "have-img">
                    <a class="wrap-img">
                        <img src="/">
                    </a>
                    <div class=" article-info">
                        <div class="info-top">
                            <a class = "blue-link"> 测试用户 </a>
                            <em>·</em>
                            <span>7分钟前</span>
                        </div>
                        <h4 class="title">
                            <a href="/">
                                随波逐流hhh
                            </a>
                        </h4>
                        <div class="info-footer">
                            <span>阅读</span><span>1</span>
                            <span>评论</span>
                        </div>

                    </div>
                </li>

                <li class = "have-img">
                    <a class="wrap-img">
                        <img src="/">
                    </a>
                    <div class=" article-info">
                        <div class="info-top">
                            <a class = "blue-link"> 测试用户 </a>
                            <em>·</em>
                            <span>7分钟前</span>
                        </div>
                        <h4 class="title">
                            <a href="/">
                                随波逐流hhh
                            </a>
                        </h4>
                        <div class="info-footer">
                            <span>阅读</span>
                            <span>评论</span>
                        </div>

                    </div>
                </li>

                <li>

                    <div class=" article-info">
                        <div class="info-top">
                            <a class = "blue-link"> 测试用户 </a>
                            <em>·</em>
                            <span>7分钟前</span>
                        </div>
                        <h4 class="title">
                            <a href="/">
                                随波逐流hhh
                            </a>
                        </h4>
                        <div class="info-footer">
                            <span>阅读</span>
                            <span>评论</span>
                        </div>

                    </div>
                </li>

            </ul>



        </div>

        <div class="fixed-button">
            <a href="/new/topicArticle/{{$params['topic']->id}}"><span class="glyphicon glyphicon-pencil"></span></a>

        </div>

    </div>
    <!-- /.container -->

    @include('tail.layout.footer')


</body>



</html>
