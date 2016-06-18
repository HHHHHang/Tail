<!DOCTYPE html>
<html lang="en">
<html>
<head>

    @include('tail.layout.lib')
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <title>发布帖子</title>

    <!-- jQuery -->

    <script src="{{URL::asset('js/jquery.touchSwipe.min.js')}}"></script>
    <script src="{{URL::asset('js/imagesloaded.min.js')}}" ></script>


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap/style.css') }}" rel="stylesheet" type="text/css" >

    <!-- Custom CSS -->
    <link href="{{URL::asset('css/navigation.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/blog-home.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/new-forum.css') }}" rel="stylesheet" type="text/css">

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

	@include('tail.layout.header', ['active' => 'bbs'])

    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div>

            <div class="col-md-10 mainBody">
                <a href="/topic/detail/{{$params['topic']->id}}"><span class="glyphicon glyphicon-chevron-left"></span> 回到话题</a>
                <div class="postTitleDiv">

                    <input id="postTitle" type="text" placeholder="标题" maxlength="30"/>
                    <span id="postTitleLengthMinder">还可输入30个字符</span>

                </div>

                <div class="postKeyWordsDiv">
                    <div>
                        <span>话题:</span>
                    </div>
                    <div>
                        <div class="chip">
                            <span>{{$params['topic']->name}}</span>
                        </div>
                    </div>
                </div>


                <div class="postEditorDiv">
                    <textarea name="content" id="editor" placeholder="正文" autofocus></textarea>
                </div>

                <div class="postBtns">
                    <button onclick="submit()">发表文章</button>
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




       $('#postTitle').on('input', function() {
           var length = 30 - $(this).val().length;
           $('#postTitleLengthMinder').text('还可输入'+ length +'个字符');
       });


       var submit = function () {

//           var topic = $('.chip > span').text();


           var title = $('#postTitle').val();
           var contentHtml = editor.getValue();
           console.log('标题: ' + title);
//           console.log('话题: ' + topic);
           console.log('正文: ' + contentHtml);

           $.ajax({
               type: 'POST',
               url: '/new/topicArticle/{{$params['topic']->id}}',
               data: {
                   title: title,
//                   topic: topic,
                   contentHtml: contentHtml
               },
               dataType: 'json',
               success: function (data) {
                   console.log(data);
                   console.log('success');
                   alert('文章发布成功');
                   location.href = '/topic/detail/{{$params['topic']->id}}';
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