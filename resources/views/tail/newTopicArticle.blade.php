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
    <link href="{{ asset('css/publish.css') }}" rel="stylesheet" type="text/css">

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

	@include('tail.layout.header', ['active' => 'topic'])

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

                <div class="setCoverDiv">
                    <div>
                        <span>设置封面图</span>
                        <span></span>
                        <a class="chip" onclick="showCoverImg()" >
                            <span>进行预览</span>
                        </a>
                        <a class="chip showChip" onclick="chooseImg()">
                            <span>选择图片</span>
                        </a>

						<form id="form" action="/new/topicArticle/{{$params['topic']->id}}" method="post" enctype="multipart/form-data">
							<input type="hidden" name="imgSrc" val="" id="imgSrc" data-toggle="modal" data-target="#createTopicModal">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input id="fileUpload" name="file" accept="image/*" type="file" multiple="multiple">
						</form>

                    </div>
                    <div class="modal fade" id="createTopicModal" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h2 class="modal-title" id="myModalLabel">封面预览</h2>
                                </div>
                                <div class="modal-body ">
                                    <div id="img-preview"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="create" class="btn btn-primary" onclick="changeImg()">更换图片</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal -->
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
           upload: {
           	   url: '/api/file',
               params: null,
               fileKey: 'upload_file',
               connectionCount: 10,
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

       var showCoverImg = function () {
           var width = document.documentElement.clientWidth * 0.8;
           $('.modal-dialog').css('width', width);
           if (!$('#createTopicModal').hasClass('in')) {
               $('#imgSrc').click();
           }
       };
       var changeImg = function () {
           $('#fileUpload').click();
       };
       var chooseImg = function () {
           $('.setCoverDiv .chip').addClass('showChip');
           $($('.setCoverDiv .chip')[1]).removeClass('showChip');
           $('#fileUpload').click();

       };
       $("#fileUpload").change(function() {
           if (typeof (FileReader) != "undefined") {
               var dvPreview = $("#img-preview");
               var regex = /(.jpg|.jpeg|.gif|.png|.bmp)$/;
               $($(this)[0].files).each(function () {
                   var file = $(this);
                   if (regex.test(file[0].name.toLowerCase())) {
                       var reader = new FileReader();
                       reader.onload = function (e) {
                           var img = $("<img style='display: none'/>");
                           img.attr("src", e.target.result);

                           dvPreview.html("");
                           dvPreview.append(img);
                           img.slideDown(300);
                           $('#imgSrc').val($("#fileUpload").val());
                           showCoverImg();
                       };
                       var src = reader.readAsDataURL(file[0]);
                   } else {
                       alert(file[0].name + " is not a valid image file.");
                       dvPreview.html("");
                       return false;
                   }
               });
           } else {
               alert("This browser does not support HTML5 FileReader.");
           }
       });



       var submit = function () {

//           var topic = $('.chip > span').text();


           var title = $('#postTitle').val();
           var contentHtml = editor.getValue();
           var coverSrc = $('#imgSrc').val();

           console.log('标题: ' + title);
//           console.log('话题: ' + topic);
           console.log('正文: ' + contentHtml);

			var form = document.getElementById("form")
			var titleInput = document.createElement("input");
			// 设置相应参数
			titleInput.type = "text";
			titleInput.name = "title";
			titleInput.value = title;
			var contentInput = document.createElement("input");
			// 设置相应参数
			contentInput.type = "text";
			contentInput.name = "contentHtml";
			contentInput.value = contentHtml;
			form.appendChild(titleInput);
			form.appendChild(contentInput);
			console.log(form)
			form.submit();

           {{--$.ajax({--}}
               {{--type: 'POST',--}}
               {{--url: '/new/topicArticle/{{$params['topic']->id}}',--}}
               {{--data: {--}}
                   {{--title: title,--}}
{{--//                   topic: topic,--}}
                   {{--contentHtml: contentHtml,--}}
                   {{--coverSrc: coverSrc--}}
               {{--},--}}
               {{--dataType: 'json',--}}
               {{--success: function (data) {--}}
                   {{--console.log(data);--}}
                   {{--console.log('success');--}}
                   {{--alert('文章发布成功');--}}
                   {{--location.href = '/topic/detail/{{$params['topic']->id}}';--}}
               {{--},--}}
               {{--error: function (error) {--}}
                   {{--console.log(error);--}}
                   {{--console.log('error');--}}
               {{--}--}}
           {{--});--}}
       }
   </script>
</body>
</html>