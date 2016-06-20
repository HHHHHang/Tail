<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>数字良品</title>
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
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">管理</strong> / <small>话题管理</small></div>
      </div>

      <hr>

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-form-group">
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
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">标题</th><th class="table-type">类别</th><th class="table-author am-hide-sm-only">作者</th><th class="table-date am-hide-sm-only">状态</th><th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody>
              @foreach($params['topics'] as $topic)
				  <tr>
					<td><input type="checkbox" /></td>
					<td>{{ $topic['id'] }}</td>
					<td><a href="{{ $topic['articleHref'] }}">{{ $topic['title'] }}</a></td>
					<td>话题</td>
					<td class="am-hide-sm-only">{{ $topic['postName'] }}</td>
					@if ($topic['isPublished'])
					<td class="am-hide-sm-only"> 已发布 </td>
					@else
					<td class="am-hide-sm-only"> 待发布 </td>
					@endif
					<td>
					  <div class="am-btn-toolbar">
						<div class="am-btn-group am-btn-group-xs">
						@if ($topic['isPublished'])
						  <button type="button" onclick="deleteTopic({{ $topic['id'] }})" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
						@else
						  <button type="button" onclick="publishTopic({{ $topic['id'] }})" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 发布</button>
						@endif
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

    <footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© 2016 数字良品. Licensed under MIT license.</p>
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
<script src="{{ asset('cms/js/topic.js') }}"></script>
</body>
</html>
