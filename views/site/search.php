<style type="text/css">

	form,h2 {
		width: 95%;
		text-align: center;
		margin-right: auto;
		margin-left: auto;
	}

	#center{
		text-align: center;
		margin-left: auto;
		margin-right: auto;
	}
</style>

<h2>请输入订单查询</h2>
<div class="col-xs-12" id="center">
	<div class="col-xs-8">
		<input type="text" class="form-control" id="keyword">
	</div>
	<button class="col-xs-4 btn btn-primary" id="search">搜索</button>
</div>
<br><br><br><br>
<p id="searchshow" class="center"></p>
<script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.js"></script>
<script>
	$(document).ready(function() {
		$("#search").click(function() {
			$.ajax({
				type: "GET",
				url: "../web/index.php?r=site/ajaxsearch&order_id=" + $("#keyword").val(),
				dataType: "json",
				success: function(data) {
					if (data.success) {
						$("#searchshow").html(data.msg);
					} else {
						$("#searchshow").html("出现错误" + data.msg);
					}
				},
				error: function(jqXHR){
					alert("error:"+jqXHR.status);
				},
			});
		});
	});
</script>

