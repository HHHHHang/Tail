<!DOCTYPE html>
<html lang="en">
<head>
	@include('tail.layout.lib')
    <link href ={{asset("css/topic-detail.css")}} rel="stylesheet" type="text/css" />
</head>
<body style="background-color: white ">

    @include('tail.layout.header')

    <!-- Page Content -->
    <div >

        <div class="top-pic ">
            <h1 class="topic-name">话题名称</h1>
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
            <a href="/"><span class="glyphicon glyphicon-pencil"></span></a>

        </div>

    </div>
    <!-- /.container -->

    @include('tail.layout.footer')


</body>



</html>
