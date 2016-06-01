<!DOCTYPE html>
<html lang="en">
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <title>发布帖子</title>

    <!-- jQuery -->
    <script src="{{asset('js/jquery.js')}}"></script>

    <script src="{{URL::asset('js/jquery.touchSwipe.min.js')}}"></script>
    <script src="{{URL::asset('js/imagesloaded.min.js')}}" ></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >

    <!-- Custom CSS -->
    <link href="{{asset('css/blog-home.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('new-forum.css') }}" rel="stylesheet" type="text/css">

    <!-- simditor CSS -->
    <link href="{{ asset('css/simditor/simditor.css') }}" rel="stylesheet" type="text/css">

    <!-- simditor JavaScript -->
    <script src="{{asset('js/simditor/jquery.min.js')}}"></script>
    <script src="{{asset('js/simditor/module.js')}}"></script>
    <script src="{{asset('js/simditor/hotkeys.js')}}"></script>
    <script src="{{asset('js/simditor/uploader.js')}}"></script>
    <script src="{{asset('js/simditor/simditor.js')}}"></script>
    <script src="{{asset('js/simditor/simditor-dropzone.js')}}"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



</head>
<body>

    <!-- Navigation -->
    <nav style="background-color: #FFFFFF; border: 2px solid #f5f5f5;box-shadow: 0 1px 4px #ccc" class="navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img class="navbar-logo" src="http://7xq64h.com1.z0.glb.clouddn.com/logo.png">
                <a class="navbar-brand" href="/">     &nbsp;&nbsp;&nbsp;首页</a>
                <a class="navbar-brand" style="color: #57ADFD" href="/forum">     &nbsp;&nbsp;&nbsp;  社区</a>
                <a class="navbar-brand" href="#">     &nbsp;&nbsp;&nbsp;  二手广场</a>
                <a class="navbar-brand" href="/search/article">     &nbsp;&nbsp;&nbsp;  其他</a>
                @if (isset($user))
                    <a class="navbar-brand"  style="margin-left: 250px" href="/myinfo?name={{ $user['name'] }}"> &nbsp;&nbsp;&nbsp;&nbsp;{{  $user['name'] }}</a>
                    <a class="navbar-brand"  href="/logout"> &nbsp;{{ '退出' }}</a>
                @endif
                @if (!isset($user))
                    <a class="navbar-brand" style="margin-left: 250px" href="/login">     &nbsp;&nbsp;&nbsp;  登陆</a>
                    <a class="navbar-brand" href="/login">     &nbsp;&nbsp;&nbsp;  注册</a>
                @endif
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div>

            <div class="col-md-10 mainBody">
                <a href="/forum"><span class="glyphicon glyphicon-chevron-left"></span> 纠结帖子</a>
                <div class="postTitleDiv">
                    <a id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="glyphicon glyphicon-menu-hamburger"></span> 选择类别</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        @foreach ( $data->type as $item )
                            <li><a onclick="chooseType(event)" >{{$item}}</a></li>
                        @endforeach
                    </ul>
                    <input id="postTitle" type="text" placeholder="标题" maxlength="30"/>
                    <span id="postTitleLengthMinder">还可输入30个字符</span>

                </div>

                <div class="postKeyWordsDiv">
                    <div>
                        <span>关键词: 可添加多个关键词</span>
                    </div>
                    <div>
                        <div class="chip">
                            <span>2016</span>
                            <a class="deleteKeyWordBtn" onclick="deleteKeyWord(event)"><span>&times;</span></a>
                        </div>
                        <input type="text" placeholder="添加关键词" id="keyWordsInput"/>
                    </div>
                </div>

                <div class="postOptionDiv">
                    <div>
                        <div>
                            <span>选项: 最多可以填写20个选项</span>
                            <a id="addOptionBtn"><span class="glyphicon glyphicon-plus-sign"></span> 添加一条选项</a>
                        </div>
                        @for ($x=0; $x< $data->choiceNum; $x++)
                            <div class="input-group postOptions">
                                <input type="text" class="form-control">
                                <span class="input-group-addon">
                                    <a class="removeOptionBtn"><span class="glyphicon glyphicon-remove"></span></a>
                                </span>
                            </div>
                        @endfor
                    </div>
                    <div>
                        <span>最多可选: <select id="optionNumSelect"></select>项</span>
                        <div>
                            <input type="checkbox" value="投票后结果可见"/>
                            <span>投票后结果可见</span>
                        </div>
                        <div>
                            <input type="checkbox" value="公开投票参与人"/>
                            <span>公开投票参与人</span>
                        </div>
                    </div>
                </div>
                <div class="postEditorDiv">
                    <textarea name="content" id="editor" placeholder="正文" autofocus></textarea>
                </div>

                <div class="postBtns">
                    <button onclick="submit()">发表帖子</button>
                    <button onclick="save()">保存草稿</button>
                </div>

                <div class="testDiv">

                </div>

            </div>
        </div>
    </div>


    <footer>

    </footer>


   <script>
       var editor = new Simditor({
           textarea: $('#editor'),
           //optional options
           upload: {  url: '',
               params: null,
               fileKey: 'upload_file',
               connectionCount: 3,
               leaveConfirm: 'Uploading is in progress, are you sure to leave this page?'

           },
           defaultImage:null,
           pasteImage:true,
           toolbarHidden:false

       });
       editor.uploader.on("uploadcomplete", function(e, file, result){
           Pace.stop();
           $.unblockUI();
       });


       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });

       var chooseType = function (event) {
           var type = event.target.text;
           var html = '<span class="glyphicon glyphicon-menu-hamburger"></span> ';
           $('#dropdownMenu1').html(html + type);
       };
       $("#keyWordsInput").keyup(function(event){
           if(event.keyCode == 13){
               var newKeyWord = $("#keyWordsInput").val();
               if (newKeyWord != null && newKeyWord != '') {
                   $("#keyWordsInput").before('<div class="chip"> ' +
                           '<span>' + newKeyWord + '</span> ' +
                           '<a class="deleteKeyWordBtn" onclick="deleteKeyWord(event)"><span>&times;</span></a>' +
                           '</div>');
                   $("#keyWordsInput").val('');
               }
           }
       });

       var deleteKeyWord =  function(event) {
           event.target.parentNode.parentNode.remove();
       };

       $("#addOptionBtn").on("click", function(event) {
           $(".postOptionDiv > div:first-child").append('<div class="input-group postOptions"> ' +
                   '<input type="text" class="form-control"> ' +
                   '<span class="input-group-addon"> ' +
                   '<a class="removeBtn"><span class="glyphicon glyphicon-remove"></span></a> ' +
                   '</span> ' +
                   '</div>'
                   );
           setSelectOption();
       });
       $(".removeOptionBtn").on("click", function (event) {
           event.target.parentNode.parentNode.parentNode.remove();
           setSelectOption();
       });

       var setSelectOption = function () {
           var optionNum = $('#optionNumSelect').val();
           console.log( optionNum );
           var length = $('.postOptions').size();
           $("#optionNumSelect").html('');
           for (var i = 1; i <= length; i++) {
               $("#optionNumSelect").append('<option>' + i + '</option>');
           }
           if (optionNum != null) {
               $('#optionNumSelect').val(optionNum >= length ? length : optionNum);
           }
       };
       setSelectOption();

       $('#postTitle').on('input', function() {
           var length = 30 - $(this).val().length;
           $('#postTitleLengthMinder').text('还可输入'+ length +'个字符');
       });


       var submit = function () {
           var length = $('.postOptions').size();
           var options = [];
           for (var i = 0; i < length; i++) {
               var str = $($('.postOptions input')[i]).val();
               if (str != null && str != '') {
                   options.push(str);
               }
           }
           var keyWords = [];
           length = $('.chip > span').size();
           for (var i = 0; i < length; i++) {
               var str = $($('.chip > span')[i]).text();
               keyWords.push(str);
           }

           var title = $('#postTitle').val();
           var optionNum = $('#optionNumSelect').val();
           var contentHtml = editor.getValue();
           var type = $('#dropdownMenu1').text().slice(1);
           console.log('标题: ' + title);
           console.log('关键词: ' + keyWords);
           console.log('选项: ' + options);
           console.log('最多选项个数: ' + optionNum);
           console.log('正文: ' + contentHtml);
           console.log('分类: ' + type);

           $.ajax({
               type: 'POST',
               url: '/new/forum',
               data: {
                   title: title,
                   keywords: keyWords,
                   options: options,
                   optionMaxNum: optionNum,
                   contentHtml: contentHtml,
                   type: type
               },
               dataType: 'json',
               success: function (data) {
                   console.log(data);
                   console.log('success');
                   location.href = '/forum';
               },
               error: function (error) {
                   console.log(error);
                   console.log('error');
               }
           });
       }
   </script>
</body>
</html>