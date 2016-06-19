<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>数字尾巴</title>
  <meta name="description" content="这是一个 table 页面">
  <meta name="keywords" content="table">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="icon" type="image/png" href="{{ asset('cms/i/favicon.png') }}">
  <link rel="apple-touch-icon-precomposed" href="{{ asset('cms/i/app-icon72x72@2x.png') }}">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="{{ asset('cms/css/amazeui.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('cms/css/admin.css') }}">
</head>
<body>

<div class="am-cf admin-main">

  @include('cms.layout')
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">管理</strong> / <small>贴子管理</small></div>
      </div>

      <hr>

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 审核</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
            </div>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
        </div>
      </div>

      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th>
                <th class="table-id">ID</th>
                <th class="table-title">标题</th><th class="table-type">类别</th>
                <th class="table-author am-hide-sm-only">展示图片</th>
                <th class="table-date am-hide-sm-only">指向链接</th>
                <th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody>
              @foreach($params['banner'] as $banner)
                  <tr>
                    <td><input type="checkbox" /></td>
                    <td>{{ $banner->id }}</td>
                    <td><a href="{{ $banner->href }}">{{ $banner->title }}</a></td>
                    <td>{{ $banner->type }}</td>
                    <td class="am-hide-sm-only">{{ $banner->file }}</td>
                    <td class="am-hide-sm-only">{{ $banner->href }}</td>
                    <td>
                      <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                          <button type="button" onclick="openModal({{$banner->id}})" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                        </div>
                      </div>
                    </td>
                  </tr>
              @endforeach
              </tbody>
            </table>
            <div class="am-cf">
              共 {{ $params['length'] }} 条记录
              {{--<div class="am-fr">--}}
                {{--<ul class="am-pagination">--}}
                  {{--<li class="am-disabled"><a href="#">«</a></li>--}}
                  {{--<li class="am-active"><a href="#">1</a></li>--}}
                  {{--<li><a href="#">2</a></li>--}}
                  {{--<li><a href="#">3</a></li>--}}
                  {{--<li><a href="#">4</a></li>--}}
                  {{--<li><a href="#">5</a></li>--}}
                  {{--<li><a href="#">»</a></li>--}}
                {{--</ul>--}}
              {{--</div>--}}
            </div>
            <hr />
          </form>
        </div>
      </div>
    </div>

    <div class="am-modal am-modal-alert" tabindex="-1" id="edit">
        <div class="am-modal-dialog">
            <div class="am-modal-bd">
            <!--模态框内容-->
                <form method="post" class="am-form">
                      <label for="email">标题:</label>
                      <input type="text" name="" id="title" value="">
                      <br>
                      <label for="password">内容:</label>
                      <input type="text" name="" id="content" value="">
                      <br>
                      <label for="password">图片链接:</label>
                      <input type="text" name="" id="file" value="">
                      <br>
                      <label for="password">指向链接:</label>
                      <input type="text" name="" id="href" value="">
                      <br>
                      <br />
                </form>
            </div>
            <div class="am-modal-footer">
                <!--关键是在这里为两个按钮加上data-am-modal-confirm与data-am-modal-cancel属性-->
                <span class="am-modal-btn" data-am-modal-confirm>提交</span>
                <span class="am-modal-btn" data-am-modal-cancel>关闭</span>
            </div>
        </div>
    </div>



    <footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© 2016 数字尾巴. Licensed under MIT license.</p>
    </footer>

  </div>
  <!-- content end -->
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="{{ asset('cms/js/amazeui.ie8polyfill.min.js') }}"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{ asset('cms/js/jquery.min.js') }}"></script>
<!--<![endif]-->
<script src="{{ asset('cms/js/amazeui.min.js') }}"></script>
<script src="{{ asset('cms/js/app.js') }}"></script>
<script src="{{ asset('cms/js/tie.js') }}"></script>
<script>
    function openModal(id) {
        $('#edit').modal({
            onConfirm: function() {
                var title= $('#title').val()
                var content = $('#content').val()
                var file = $('#file').val()
                var href = $('#href').val()
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					url: "/editBanner",
					type: "post",
					data: {
						id : id,
						title: title,
						content: content,
						file: file,
						href: href
					},
					success: function(data) {
						alert("发表成功!")
//						window.location.reload();
						console.log(data)
					}
				})
            },
            onCancel: function() {

            }
        });
    }
</script>
</body>
</html>
