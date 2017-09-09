<?php
    session_start();
	header("content-type:text/html;charset=utf-8");
    if(isset($_SESSION['username'])){
    	//$id=$_SESSION['user_id'];
    	$id=intval($_GET['id']);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			我的
		</title>
		<!--<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<link rel="stylesheet" href="https://weui.io/weui.css" />
		<script src="https://weui.io/zepto.min.js">
		</script>-->
		<link rel="stylesheet" href="js/weui-master/dist/style/weui.css">
		<script src="js/weui-master/dist/example/zepto.min.js" type="text/javascript" charset="utf-8"></script>
  	
		<script>
			function niinfo() {
				var $iosDialog2 = $('#iosDialog2');
				$("#infotext").text("请输入昵称"); //input 赋值 动态
				$iosDialog2.fadeIn(200);
			}

			function geinfo() {
				var $iosDialog2 = $('#iosDialog2');
				$("#infotext").text("请输入个性签名"); //input 赋值 动态
				$iosDialog2.fadeIn(200);
			}

			function tuinfo() {
				var $iosDialog2 = $('#iosDialog2');
				$("#infotext").text("请选择头像"); //input 赋值 动态
				$iosDialog2.fadeIn(200);
			}

			function cancelinfo() {
				var $iosDialog2 = $('#iosDialog2');
				$iosDialog2.fadeOut(100);
			}

			function successinfo() {
			    var $iosDialog2 = $('#iosDialog2');
			    $("#infotext").text("发布成功");
			    $iosDialog2.fadeIn(200);
		    }

			function canshuinfo() {
				var $iosDialog2 = $('#iosDialog2');
				$("#infotext").text("请输入完整"); //input 赋值 动态
				$iosDialog2.fadeIn(200);
			}
			

			
		</script>
		<script>
			$(function() {
				$('#showTooltips').click(function() {
					// $( '#form1').serialize()不能序列化上传的文件
					var data = new FormData($('#form1')[0]);
					var nicheng = $('#nicheng').val();
					var geqian = $('#geqian').val();
					var tupian = $('#tupian').val();
					var id=<?php echo $id?>;
					data.append('id',id);
					if (nicheng == "") {
						niinfo();
						return false;
					}
					if (geqian == "") {
						geinfo();
						return false;
					}
					if (tupian == "") {
						tuinfo();
						return false;
					}
					$.ajax({
						type: "POST",
						url: "nichengtest.php",
						dataType: "json",
						data: data,
						processData: false,
						contentType: false,
						success: function(data) {
							if (data.code == 1) {
								canshuinfo();
								
							} else {
								successinfo();
							    var id=data.id;
							    
							  location.href="my.php?id="+id;
							}
						},
					});
				});
			});
		</script>
	</head>

	<body>
		<form id="form1">
			<div class="js_dialog" id="iosDialog2" style="opacity: 0; display: none;">
				<div class="weui-mask">
				</div>
				<div class="weui-dialog">
					<div class="weui-dialog__bd" id="infotext">
						
					</div>
					<div class="weui-dialog__ft">
						<a href="javascript:;" class="weui-dialog__btn weui-dialog__btn_primary" onclick="cancelinfo()">
						知道了
					</a>
					</div>
				</div>
			</div>
			<div class="weui-cell">
				<div class="weui-cell__hd">
					<label class="weui-label">昵称</label>
				</div>
				<div class="weui-cell__bd">
					<input id="nicheng" name="nicheng" class="weui-input" type="text" placeholder="请输入昵称">
				</div>
			</div>
			<div class="weui-cell">
				<div class="weui-cell__hd">
					<label class="weui-label">个性签名</label>
				</div>
				<div class="weui-cell__bd">
					<input id="geqian" name="geqian" class="weui-input" type="text" placeholder="请完善你的个签吧">
				</div>
			</div>
			<div class="weui-cell">
				<div class="weui-cell__hd">
					<label class="weui-label">图片</label>
				</div>
				<div class="weui-cell__bd">
					<input id="tupian" name="tupian" class="weui-input" type="file" placeholder="选择文件">
				</div>
			</div>
			<div class="weui-btn-area">
				<a class="weui-btn weui-btn_primary" href="javascript:" id="showTooltips">
				确定
			</a>
			</div>
			<div class="weui-btn-area">
				<a class="weui-btn weui-btn_primary" href="my.php" id="calTooltips">
				取消
				
			</div>

		</form>

	</body>

</html>
<?php
}else{
	echo '<a href="login.html">请登录</a>';

}
	?>