
$(document).ready(function(){


	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$("#search").click(function(){
		$.ajax({
			url: "/search",
			type: "post",
			data: { testdata : 'testdatacontent',
					phone: $("input[id='phone']").val()
			},
			success:function(data){
				console.log(data)
				if (data['msg'] == 'fail') {
					alert("错误的手机号码！请重新输入");
				} else {
					$("p[id='info']").html("本月总话费: " + data['amount'].toFixed(2))
					$("p[id='info1']").html("本月应缴滞纳金: " + data['interest'])
					$("p[id='info2']").html("本月通话话费: " + (data['amount'] - data['interest'] - 25).toFixed(2))
					$("p[id='info3']").html("其他话费: " + (0).toFixed(2))
					$("p[id='info4']").html("基本月租费: " + (25).toFixed(2))
				}
			},error:function(){
				alert("不存在这样的电话号码！");
			}
		});
	});

	$("#pay").click(function(){
		$.ajax({
			url: "/search",
			type: "post",
			data: { testdata : 'testdatacontent',
				phone: $("input[id='phone']").val()
			},
			success:function(data){
				console.log(data['msg']);
				if (data['msg'] == 'fail') {
					alert("错误的手机号码！请重新输入");
				} else if (data['msg'] == 'success') {
					console.log(data)
					alert("充值成功！");
					$("p[id='info']").html("本月总话费: " + data['amount'].toFixed(2))
					$("p[id='info1']").html("本月滞纳金: " + data['interest'])
					$("p[id='info2']").html("本月通话话费: " + (data['amount'] - data['interest'] - 25).toFixed(2))
				}
			},error:function(){
				alert("error!!!!");
			}
		});
	});


});
