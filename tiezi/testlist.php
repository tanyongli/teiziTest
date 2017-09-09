<?php
require ("mysql_class.php");
$db = new Mysql("localhost", "root", "201122", "userdb");
define("TABLENAME", "user_post");
$select = $db -> selectsql(TABLENAME);
$num = $db -> num($select);//总记录数
$fnum = 5;//每页显示条数
$pagenum = ceil($num / $fnum);//总页数
$tmp = intval($_POST['pageNum']);//html页面传过来的，当前页数-1
//防止恶意翻页
if ($tmp+1 > $pagenum)
	echo "<script>window.location.href='list_1test.php'</script>";
//计算分页起始值
if ($tmp == 0) {
	$num1 = 0;
} else {
	$num1 = $tmp * $fnum;
	
}
$query=mysql_query("SELECT *  FROM  user_post ORDER BY id DESC LIMIT " . $num1 . ",$fnum");
while($row=mysql_fetch_array($query)){
	$userid = $row['user_id'];
	$result = mysql_query("select * from user_nickname where user_id='$userid'");
	$roww = mysql_fetch_array($result);
    $data[] = array(
		'title'=>$row['title'],
		'nickname'=>$roww['nickname'],
		'postid'=>$row['id']
      );
	  
	 
}

     die(json_encode($data));
?>
