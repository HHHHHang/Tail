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
			<h1>总共442个测试用例，通过442个</h1>
			<table id="myTable" data-toggle="table"
				   data-url="http://115.28.180.158/api"
				   data-sort-name="stargazers_count"
				   data-pagination="true"
				   data-page-list="[5,10,20,50]"
				   data-sort-order="desc">
				<thead>
				<tr>
					<th data-field="id"
						data-sortable="true">
							测试用例序号
					</th>
					<th data-field="ownAmount"
						data-sortable="true">
							去年未缴费金额
					</th>
					<th data-field="count"
						data-sortable="true">
							本年度未缴费次数
					</th>
					<th data-field="time"
						data-sortable="true">
							本月通话时间长度
					</th>
					<th data-field="needPayAmount"
						data-sortable="true">
							本月应付话费
					</th>
					<th data-field="expert"
						data-sortable="true">
							实际应付话费
					</th>
					<th data-field="pass"
						data-sortable="true">
							是否通过
					</th>
				</tr>
				</thead>
			</table>

		</div>


	</body>
</html>

