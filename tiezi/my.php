<?php
 require("mysql_class.php");
$db = new Mysql("localhost", "root", "201122", "userdb");
//$id=intval($_GET['id']);
 session_start();
if(isset($_SESSION['username'])){
$id=$_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>我的</title>
		<!--<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<link rel="stylesheet" href="https://weui.io/weui.css" />
		<script src="https://weui.io/zepto.min.js"></script>-->
		<link rel="stylesheet" href="js/weui-master/dist/style/weui.css">
		<script src="js/weui-master/dist/example/zepto.min.js" type="text/javascript" charset="utf-8"></script>
  	
		<script>
            $(function(){
            	 
                 $('#tianxie').click(function(){
                 	
                 	var id=<?php echo $id?>;
                    location.href="nicheng.php?id="+id;
                 });
            });
		</script>
		
	</head>

	<body>
		<div class="weui-cell" id="tianxie" >
			<?php
			   
			    define("TABLENAME", "user_nickname");
				define("CON","where user_id='$id'");
                //查询user_nickname数据表
               // $sqlstr=$db->select(TABLENAME, CON)
                $sqlstr="select * from user_nickname where user_id=$id";
                $query = mysql_query($sqlstr) or die(mysql_error()); 
				$thread = mysql_fetch_assoc($query); 
				//$thread=$db->arr($sqlstr);
				$num=mysql_num_rows($query);
				if($num==1){
					echo '<div class="weui-cell__hd" style="position: relative;margin-right: 10px;">
                       <img src="image.php?id='.$thread['user_id'].'"style="width: 50px;display: block">
                       </div>';
					  echo '
			          <div class="weui-cell__bd">
			           	<p id="nicheng" name="nicheng">'.$thread['nickname'].'</p>
			         	<p id="geqian" style="font-size: 13px;color: #888888;">个性签名：'.$thread['sign'].'</p>
			          </div>';
				}else{
					echo '<div class="weui-cell__hd" style="position: relative;margin-right: 10px;">
				
				<img src="" style="width: 50px;display: block">
				
			</div>
			<div class="weui-cell__bd">
				<p id="nicheng" name="nicheng">昵称</p>
				<p id="geqian" style="font-size: 13px;color: #888888;">个性签名</p>
			</div>';
				}        
                
			?>
		</div>
		<div class="weui-panel">
			<div class="weui-panel__bd">
				<div class="weui-media-box weui-media-box_small-appmsg">
					<div class="weui-cells">
						<a class="weui-cell weui-cell_access" href="javascript:;">
							<div class="weui-cell__hd"><img src="img/1.jpg"
									alt="" style="width:20px;margin-right:5px;display:block"></div>
							<div class="weui-cell__bd weui-cell_primary">
								<p>钱包</p>
							</div>
							<span class="weui-cell__ft"></span>
						</a>
						<a class="weui-cell weui-cell_access" href="javascript:;">
							<div class="weui-cell__hd"><img src="img/2.jpg"
									alt="" style="width:20px;margin-right:5px;display:block"></div>
							<div class="weui-cell__bd weui-cell_primary">
								<p>收藏</p>
							</div>
							<span class="weui-cell__ft"></span>
						</a>
						<a class="weui-cell weui-cell_access" href="javascript:;">
							<div class="weui-cell__hd"><img src="img/3.png"
							        alt="" style="width:20px;margin-right:5px;display:block"></div>
							<div class="weui-cell__bd weui-cell_primary">
								<p>相册</p>
							</div>
							<span class="weui-cell__ft"></span>
						</a>
						<a class="weui-cell weui-cell_access" href="javascript:;">
							<div class="weui-cell__hd"><img src="img/4.png"
									alt="" style="width:20px;margin-right:5px;display:block"></div>
							<div class="weui-cell__bd weui-cell_primary">
								<p>表情</p>
							</div>
							<span class="weui-cell__ft"></span>
						</a>
						<a class="weui-cell weui-cell_access" href="javascript:;">
							<div class="weui-cell__hd"><img src="img/5.png"
									alt="" style="width:20px;margin-right:5px;display:block"></div>
							<div class="weui-cell__bd weui-cell_primary">
								<p>设置</p>
							</div>
							<span class="weui-cell__ft"></span>
						</a>
						<a class="weui-cell weui-cell_access" href="login.html">
							<div class="weui-cell__hd"><img src=""
									alt="" style="width:20px;margin-right:5px;display:block"></div>
							<div class="weui-cell__bd weui-cell_primary">
								<p>退出登录</p>
							</div>
							<span class="weui-cell__ft"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="weui-tabbar">
	<a href="list.html" class="weui-tabbar__item weui-bar__item_on">
		<span style="display: inline-block;position: relative;">
			<img src="js/weui-master/dist/example/images/icon_tabbar.png" alt="" class="weui-tabbar__icon">
			<!--<span class="weui-badge" style="position: absolute;top: -2px;right: -13px;">8</span>-->
		</span>
		<p class="weui-tabbar__label">
			首页
		</p>
	</a>
	
	<a href="find.html" class="weui-tabbar__item">
		<span style="display: inline-block;position: relative;">
			<img src="js/weui-master/dist/example/images/icon_tabbar.png" alt="" class="weui-tabbar__icon">
			<!--<span class="weui-badge weui-badge_dot" style="position: absolute;top: 0;right: -6px;">
			</span>-->
		</span>
		<p class="weui-tabbar__label">
			发现
		</p>
	</a>
	<a href="my.php" class="weui-tabbar__item">
		<img src="js/weui-master/dist/example/images/icon_tabbar.png" alt="" class="weui-tabbar__icon">
		<p class="weui-tabbar__label">
			我
		</p>
	</a>
</div>
	</body>

</html>
<?php
}else{
	
	echo '<a href="login.html">请登录</a>';
}
	?>