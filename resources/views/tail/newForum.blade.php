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

    <!-- simditor CSS -->
    <link href="{{ asset('css/simditor/simditor.css') }}" rel="stylesheet" type="text/css">

    <!-- simditor JavaScript -->
    <script src="{{asset('js/simditor/jquery.min.js')}}"></script>
    <script src="{{asset('js/simditor/module.js')}}"></script>
    <script src="{{asset('js/simditor/hotkeys.js')}}"></script>
    <script src="{{asset('js/simditor/uploader.js')}}"></script>
    <script src="{{asset('js/simditor/simditor.js')}}"></script>
    <script src="{{asset('js/simditor/simditor-dropzone.js')}}"></script>


    <!-- Custom CSS -->
    <link href="{{URL::asset('css/navigation.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/blog-home.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/publish.css') }}" rel="stylesheet" type="text/css">

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
                @if ($params['isKinkTie'])
                    <a href="/forum/kinkTie"><span class="glyphicon glyphicon-chevron-left"></span> 纠结帖子</a>
                @else
                    <a href="/forum/tie"><span class="glyphicon glyphicon-chevron-left"></span> 普通帖子</a>
                @endif

                <div class="postTitleDiv">
                    <a id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="glyphicon glyphicon-menu-hamburger"></span>选择频道 全部</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        @foreach ( $params['data']->type as $item )
                            <li><a onclick="chooseType(event)" >{{$item}}</a></li>
                        @endforeach
                    </ul>
                    <input id="postTitle" type="text" placeholder="标题" maxlength="30"/>
                    <span id="postTitleLengthMinder">还可输入30个字符</span>

                </div>

                    @if ($params['isKinkTie'])
                        <div class="postOptionDiv">
                            <div>
                                <div>
                                    <span>选项: 最多可以填写20个选项</span>
                                    <a id="addOptionBtn"><span class="glyphicon glyphicon-plus-sign"></span> 添加一条选项</a>
                                </div>
                                @for ($x=0; $x< $params['data']->choiceNum; $x++)
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
                    @endif


                <div class="postEditorDiv">
                    <textarea name="content" id="editor" placeholder="正文" autofocus></textarea>
                </div>

                <div class="postBtns">
                    @if ($params['isKinkTie'])
                        <button onclick="submitKinkTie()">发表帖子</button>
                    @else
                        <button onclick="submitTie()">发表帖子</button>
                    @endif


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
           upload: {
               url: '/api/file',
               params: null,
               fileKey: 'upload_file',
               connectionCount: 20,
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
           var html = '<span class="glyphicon glyphicon-menu-hamburger"></span>选择类别 ';
           $('#dropdownMenu1').html(html + type);
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

       var submitKinkTie = function () {
           submit('kinkTie');
       };

       var submitTie = function () {
           submit('tie');
       };

       var submit = function (to) {
           url = '/new/' + to;

           var length = $('.postOptions').size();
           var options = [];
           for (var i = 0; i < length; i++) {
               var str = $($('.postOptions input')[i]).val();
               if (str != null && str != '') {
                   options.push(str);
               }
           }

           var title = $('#postTitle').val();
           var optionNum = $('#optionNumSelect').val();
           var contentHtml = editor.getValue();
           var type = $('#dropdownMenu1').text().slice(5);
           console.log('标题: ' + title);
           console.log('选项: ' + options);
           console.log('最多选项个数: ' + optionNum);
           console.log('正文: ' + contentHtml);
           console.log('分类: ' + type);

           $.ajax({
               type: 'POST',
               url: url,
               data: {
                   title: title,
                   options: options,
                   optionMaxNum: optionNum,
                   contentHtml: contentHtml,
                   type: type
               },
               dataType: 'json',
               success: function (data) {
                   console.log(data);
                   console.log('success');
                   location.href = '/forum/' + to;
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