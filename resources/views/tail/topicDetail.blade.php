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


        <div class="top-pic " style="background-image: url({{$params['topic']->image}})">
            <div class="back" >
                <a href="/topic"><span class="glyphicon glyphicon-chevron-left"></span> 话题广场</a>
            </div>
            <div class="topic-name" ><h1>{{$params['topic']->name}}</h1></div>

        </div>

        <div class="article-list">

            <ul class="article-item">
                @foreach($params['articlesInfo'] as $articleInfo)
                    @if($articleInfo['article']->image!=null)

                        <li class = "have-img">
                            <a class="wrap-img">
                                <img src={{$articleInfo['article']->image}}>
                            </a>
                            <div class=" article-info">
                                <div class="info-top">
                                    <a class = "blue-link"> {{$articleInfo['author']->name}} </a>
                                    <em>·</em>
                                    <span>{{$articleInfo['article']->createTime}}</span>
                                </div>
                                <h4 class="title">
                                    <a href="/topic/article/{{$articleInfo['article']->id}}">
                                        {{$articleInfo['article']->title}}
                                    </a>
                                </h4>
                                <div class="info-footer">
                                    <span class="glyphicon glyphicon-eye-open"><span>{{$articleInfo['article']->viewNum}}</span></span>
                                    <span class="glyphicon glyphicon-comment"><span>{{$articleInfo['article']->commentNum}}</span></span>
                                    <span class="glyphicon glyphicon-thumbs-up"><span>{{$articleInfo['article']->upNum}}</span></span>
                                </div>

                            </div>
                        </li>
                    @else
                        <li >
                            <div class=" article-info">
                                <div class="info-top">
                                    <a class = "blue-link"> {{$articleInfo['author']->name}} </a>
                                    <em>·</em>
                                    <span>{{$articleInfo['article']->createTime}}</span>
                                </div>
                                <h4 class="title">
                                    <a href="/topic/noPicTopicArticle/{{$articleInfo['article']->id}}">
                                        {{$articleInfo['article']->title}}
                                    </a>
                                </h4>
                                <div class="info-footer">
                                    <span class="glyphicon glyphicon-eye-open"><span>{{$articleInfo['article']->viewNum}}</span></span>
                                    <span class="glyphicon glyphicon-comment"><span>{{$articleInfo['article']->commentNum}}</span></span>
                                    <span class="glyphicon glyphicon-thumbs-up"><span>{{$articleInfo['article']->upNum}}</span></span>
                                </div>

                            </div>
                        </li>
                    @endif


                @endforeach

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
