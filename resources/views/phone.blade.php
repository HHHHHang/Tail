<!DOCTYPE html>
<html lang="en">

<meta name="csrf-token" content="{{ csrf_token() }}">

	<head>
		<title>Wort - An HTML5 Registration Template</title>
		<script src="{{URL::asset('modernizr.js')}}"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<script src="{{URL::asset('search.js')}}"></script>
		<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="content">
			<div id="register_box">
				<div id="head">
					<h1>线上手机充值查询系统</h1>
				</div>
				<div id="main_box">
					<form class="register">
						<h1>输入手机号码：</h1>
						<br />
						
						<div class="text">
							<img src="{{ asset('images/username.png') }}" alt="手机号码" />
							<input id="phone" type="text" name="phoneNum" placeholder="手机号码" /><br />
						</div>
						<div class="text">
							<img src="{{ asset('images/username.png') }}" alt="手机号码" />
							<input id="amount" type="text" name="amout" placeholder="充值金额" /><br />
						</div>
						<input id="search" type="button" value="查询"/>
						<input type="hidden" id="token" value="{{ csrf_token() }}">
						<input id="pay" type="button" value="充值" />
						<br /><br /><br />					
					</form>
					
					<div class="right_box">
						<div id="benefits">
							<h1>手机话费相关信息</h1>
							<br>
							<ul>
								<li>
									<div class="he">话费详情</div>
									<br>
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
		</div>
	</body>
</html>

