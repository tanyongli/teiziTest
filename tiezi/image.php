<?php
require("mysql_class.php");
$db = new Mysql("localhost", "root", "201122", "userdb");
$id = intval($_GET['id']);
//查询user_nickname数据表
$sqlstr = "select * from user_nickname where user_id=$id";
$query = mysql_query($sqlstr) or die(mysql_error());
$thread = mysql_fetch_assoc($query);
if ($thread) {
	header('content-type:' . $thread['type']);
	echo $thread['binarydata'];
	exit();
}
?>