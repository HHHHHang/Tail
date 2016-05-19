<!DOCTYPE html>
<html lang="en">

<meta name="csrf-token" content="{{ csrf_token() }}">

	<head>


		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>

        <!-- Latest compiled and minified Locales -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/locale/bootstrap-table-zh-CN.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.css">


		<!-- Latest compiled and minified JavaScript -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>

		<!-- Latest compiled and minified Locales -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/locale/bootstrap-table-zh-CN.min.js"></script>

		<title>Wort - An HTML5 Registration Template</title>
		<script src="{{URL::asset('modernizr.js')}}"></script>
		<script src="{{URL::asset('test.js')}}"></script>
		<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="content">
			<div id="register_box">
				<div id="head">
					<h1>线上手机充值查询系统(测试)</h1>
				</div>
				<div id="main_box">
					<form class="register">
						<h1>输入测试数据：</h1>
						<br />
						
						<div class="text">
							<img src="{{ asset('images/username.png') }}" alt="手机号码" />
							<input id="lastYearAmount" type="text" name="lastYearAmount" placeholder="去年未缴费用" />
						</div>
						<div class="text">
							<img src="{{ asset('images/username.png') }}" alt="手机号码" />
							<input id="mins" type="text" name="phoneTime" placeholder="本月通话时间" />
						</div>
						<div class="text">
							<img src="{{ asset('images/username.png') }}" alt="手机号码" />
							<input id="notPayTime" type="text" name="notPayTime" placeholder="本年度未缴费次数" />
						</div>
						<input id="search" type="button" value="计算结果"/>
						<input type="hidden" id="token" value="{{ csrf_token() }}">
						<br /><br /><br />
					</form>
					
					<div class="right_box">
						<div id="benefits">
							<h1>测试结果</h1>
							<br>
							<ul>
								<li>
									<div class="he">话费详情</div>
									<p id="info"></p>
									<br>
									<p id="info1"> </p>
									<br>
									<p id="info2"> </p>
									<br>
									<p id="info4"> </p>
									<br>
									<p id="info3"> </p>
									<p></p>
								</li>

							</ul>
						</div>
						<br /><br /><br />
						<div class="fbl">
							<br />
							<br />
						</div>
					</div>
				</div>
				<div id="footer_box">
				</div>
			</div>
			<br>
			<br>
			<br>

		</div>


	</body>
</html>

