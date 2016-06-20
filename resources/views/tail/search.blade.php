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

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >


    <!-- Custom CSS -->
    <link href="{{URL::asset('css/blog-home.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-color: #f5f5f5; padding-top: 0px;">

    <!-- Search Bar -->

    <!-- Page Content -->
    <div  style="background-color: #2a8bcb; height: 200px ; width: 100%; padding: 50px 0px;">

        <!-- Search Bar -->
        <div class="row">
            <div class="col-md-4 text-right" style="">
                <a href="#">
                    <img src="http://o7m73hlz0.bkt.clouddn.com/logo_sc_s.png" alt="dgtle" style="text-align: center; margin-top: 10px"/>
                </a>
            </div>
            <div class="col-md-8">
                <div style="padding:10px 10px; font-size: large">
                    <div class="col-md-3 text-center">
                        <a href="#" style="color: white;">文章</a>
                    </div>
                    <div class="col-md-9" style="padding-left: 50px">
                        <a href="#" style="color: white;">帖子</a>
                    </div>
                </div>
                <br/>
                <div class="text-center" style="width: 500px; margin-top: 10px">
                    <form method="post" action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="请输入搜索内容">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info" type="button"><span class="glyphicon glyphicon-search"></span></button>
                                        </span>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <!-- Search Notice -->

        <div style="margin-top: 80px; margin-left: 100px; font-size: large">
            <h2>结果:找到相关内容 2 个</h2>
        </div>

        <!-- Search Content -->

        <div style="margin-top: 30px; margin-left: 100px; width: 800px">

            <!-- First Search Article -->
            <div>
                <a href="#"><img src="http://o7m73hlz0.bkt.clouddn.com/103410az073wvcww88vcrc.jpg" alt="" style="width: 800px"></a>
                <br/>
                <a href="#"><h1 style="color: black; font-size: large; padding-top: 20px">五月搞机季，数字良品深圳沙龙回顾</h1></a>
                <br/>
                <p>距离数字良品上次沙龙活动的时间已经过去了很久，想必尾巴们都十分期待着又一场精彩的线下沙龙吧。为了满足尾巴们搞机的愿望，数字良品特地组织了一次“五月搞机季”的线下沙龙活动，而地点就位于数字良品的深圳总部 ...</p>
                <br/>
                <p>浏览量：1350
                    <span style="float:right; color: #2ca02c">2016-5-23 10:34</span>
                    <span style="float:right; margin-right:20px; color: #2ca02c">小淼-海</span>
                </p>
                <br/>
                <br/>
                <br/>
            </div>

            <!-- Second Search Article -->

            <div>
                <a href="#"><img src="http://o7m73hlz0.bkt.clouddn.com/231627uddpee0kpenrr7t3.jpg" alt="" style="width: 800px"></a>
                <br/>
                <a href="#"><h1 style="color: black; font-size: large; padding-top: 20px">深夜俱乐部 | 说出你的手机系统版本号</h1></a>
                <br/>
                <p>每年都会有手机新系统大更，但你会在第一时间升级到最新版本吗？每隔一段时间都会有系统小更新，你的手机现在又停留在哪个系统版本号？今天的「 深夜俱乐部 」，就来聊聊手机系统更新的话题。 ... ... ...</p>
                <br/>
                <p>浏览量：6624
                    <span style="float:right; color: #2ca02c">2016-5-22 23:16</span>
                    <span style="float:right; margin-right:20px; color: #2ca02c">利剑</span>
                </p>
            </div>

        </div>










        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->


</body>

</html>
