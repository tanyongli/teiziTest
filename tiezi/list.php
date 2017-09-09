<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			帖子列表
		</title>
		<!--<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<link rel="stylesheet" href="https://weui.io/weui.css" />
		<script src="https://weui.io/zepto.min.js">
		</script>-->
		<link rel="stylesheet" href="js/weui-master/dist/style/weui.css">
		<script src="js/weui-master/dist/example/zepto.min.js" type="text/javascript" charset="utf-8"></script>
  	
	</head>
	<body>
		<div class="weui-cells">
			<a class="weui-cell weui-cell_access" href="fatie.html">
				<div class="weui-cell__bd">
					<p>
						写帖子
					</p>
				</div>
				<div class="weui-cell__ft">
					点击填写自己的帖子
				</div>
			</a>
		</div>
		<div class="weui-cells__title">
			帖子列表
		</div>
	</body>
</html>-->




<?php
error_reporting(0);
require ("mysql_class.php");
$db = new Mysql("localhost", "root", "201122", "userdb");
$user_id = intval($_GET['id']);
define("TABLENAME", "user_post");
$select = $db -> selectsql(TABLENAME);
//总条数
$num = $db -> num($select);
// 每页显示条数
$fnum = 5;
// 翻页数
$pagenum = ceil($num / $fnum);
// 页数常量
@$tmp = $_GET['page'];
//防止恶意翻页
if ($tmp > $pagenum)
	echo "<script>window.location.href='list.php'</script>";
//计算分页起始值
if ($tmp == "") {
	$num1 = 0;
} else {
	$num1 = ($tmp - 1) * $fnum;
}
//if ($tmp >= 1 && $tmp <= $pagenum) {
//	$pre = $tmp - 1;
//	$next = $tmp + 1;
//}
$sql1 = "SELECT *  FROM  user_post ORDER BY id DESC LIMIT " . $num1 . ",$fnum";
$re = mysql_query($sql1);
//$row=mysql_fetch_array($re);
for ($i = 0; $i < $fnum; $i++) {
	//$row = $db -> arr($select);
	$row = mysql_fetch_array($re);
	$id = $row['id'];
	$userid = $row['user_id'];
	$title = $row['title'];
	$aritle = $row['aritle'];
	$sql = "select * from user_nickname where user_id='$userid'";
	$result = mysql_query($sql);
	$roww = mysql_fetch_array($result);
	$nickname = $roww['nickname'];
	echo '<div class="weui-cells">
<a class="weui-cell weui-cell_access" href="aritle.php?id=' . $id . '"  >
<div class="weui-cell__bd">
<p>' . $title . '</p>
</div>
<div class="weui-cell__ft">' . $nickname . ' </div>
</a>
</div>';
}
   //翻页链接
for ($i = 0; $i < $pagenum; $i ++) {
     echo' <a href="list.php?page='.($i+1).'" class="weui-btn weui-btn_mini weui-btn_default">'.($i + 1).'</a>';
    }
//echo '<a href="list.php?page=' . $pre . '" class="weui-btn weui-btn_mini weui-btn_default">上一页</a>';
//echo '<a href="list.php?page=' . $next . '" class="weui-btn weui-btn_mini weui-btn_default">下一页</a>';
echo '<a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_default">共' . $pagenum . '页</a>';
?>




<div class="weui-tabbar">
	<a href="list.php" class="weui-tabbar__item weui-bar__item_on">
		<span style="display: inline-block;position: relative;">
			<img src="http://weui.io/images/icon_tabbar.png" alt="" class="weui-tabbar__icon">
			
			
		<p class="weui-tabbar__label">
			首页
		</p>
	</a>
	<a href="find.html" class="weui-tabbar__item">
		<span style="display: inline-block;position: relative;">
			<img src="http://weui.io/images/icon_tabbar.png" alt="" class="weui-tabbar__icon">
			
		</span>
		<p class="weui-tabbar__label">
			发现
		</p>
	</a>
	<a href="my.php" class="weui-tabbar__item">
		<img src="http://weui.io/images/icon_tabbar.png" alt="" class="weui-tabbar__icon">
		<p class="weui-tabbar__label">
			我
		</p>
	</a>
</div>