<?php
require ("mysql_class.php");
$db = new Mysql("localhost", "root", "201122", "userdb");
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
//$tmp = "";
//防止恶意翻页
if ($tmp > $pagenum)
	echo "<script>window.location.href='list_1test.php'</script>";
//计算分页起始值
if ($tmp == "") {
	$num1 = 0;
} else {
	$num1 = ($tmp - 1) * $fnum;
	
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
for ($i = 0; $i < $pagenum; $i ++) {  
     echo "<a href=list_1test.php?page=" . ($i + 1) . ">" . ($i + 1) . "</a>";  
     //echo' <a href="list_1test.php?page='.($i+1).'></a>';
    } 

     die(json_encode($data));
?>
