<!DOCTYPE html>
<html lang="en">
<html>
<head>

@include('tail.layout.lib')
<meta name="csrf-token" content="{{ csrf_token() }}" />


<title>发布文章</title>

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

@include('tail.layout.header', ['active' => 'article'])

<div class="container">
    <div class="row">
        <div class="col-md-1">
        </div>

        <div class="col-md-10 mainBody">
            <a href="/forum"><span class="glyphicon glyphicon-chevron-left"></span>文章</a>
            <div class="postTitleDiv">
                <a id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="glyphicon glyphicon-menu-hamburger"></span> 选择类别</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    @foreach ( $params['data']->type as $item )
                        <li><a onclick="chooseType(event)" >{{$item}}</a></li>
                    @endforeach
                </ul>
                <input id="postTitle" name="title" type="text" placeholder="标题" maxlength="30"/>
                <span id="postTitleLengthMinder">还可输入30个字符</span>

            </div>

            <div class="postKeyWordsDiv">
                <div>
                    <span>关键词: 可添加多个关键词</span>
                </div>
                <div>
                    <div class="chip keyword">
                        <span>2016</span>
                        <a class="deleteKeyWordBtn" onclick="deleteKeyWord(event)"><span>&times;</span></a>
                    </div>
                    <input type="text" placeholder="添加关键词" id="keyWordsInput"/>
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
                    <form id="form" action="/new/article" method="post" enctype="multipart/form-data">
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

    var chooseType = function (event) {
        var type = event.target.text;
        var html = '<span class="glyphicon glyphicon-menu-hamburger"></span> ';
        $('#dropdownMenu1').html(html + type);
    };

    $("#keyWordsInput").keyup(function(event){
        if(event.keyCode == 13){
            var newKeyWord = $("#keyWordsInput").val();
            if (newKeyWord != null && newKeyWord != '') {
                $("#keyWordsInput").before('<div class="chip keyword"> ' +
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


    $('#postTitle').on('input', function() {
        var length = 30 - $(this).val().length;
        $('#postTitleLengthMinder').text('还可输入'+ length +'个字符');
    });

    var submit = function () {
        var length = $('.postOptions').size();

        var keyWords = [];
        length = $('.keyword > span').size();
        for (var i = 0; i < length; i++) {
            var str = $($('.chip > span')[i]).text();
            keyWords.push(str);
        }

        var title = $('#postTitle').val();
        var contentHtml = editor.getValue();
        var type = $('#dropdownMenu1').text().slice(1);
        var coverSrc = $('#imgSrc').val();
        console.log('标题: ' + title);
        console.log('关键词: ' + keyWords);
        console.log('封面图片: ' + coverSrc);
        console.log('正文: ' + contentHtml);
        console.log('分类: ' + type);

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
        var typeInput = document.createElement("input");
        // 设置相应参数
        typeInput.type = "text";
        typeInput.name = "type";
        typeInput.value = type;
        var kwInput = document.createElement("input");
        // 设置相应参数
        kwInput.type = "text";
        kwInput.name = "keywords";
        kwInput.value = JSON.stringify(keyWords);
        form.appendChild(titleInput);
        form.appendChild(typeInput);
        form.appendChild(contentInput);
        form.appendChild(kwInput);
        console.log(form)
        form.submit();

//        $.ajax({
//            type: 'POST',
//            url: '/new/article',
//            data: {
//                title: title,
//                keywords: keyWords,
//                contentHtml: contentHtml,
//                type: type,
//                coverSrc: coverSrc
//            },
//            dataType: 'json',
//            success: function (data) {
//                console.log(data);
//                console.log('success');
//                location.href = '/forum';
//            },
//            error: function (error) {
//                console.log(error);
//                console.log('error');
//            }
//        });
    }

</script>
</body>
</html>