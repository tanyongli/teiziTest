<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			文章
		</title>
		<!--<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<link rel="stylesheet" href="https://weui.io/weui.css" />-->
		<link rel="stylesheet" href="js/weui-master/dist/style/weui.css">
		<script src="js/weui-master/dist/example/zepto.min.js" type="text/javascript" charset="utf-8"></script>
  	
	</head>
	<body>
	</body>
</html>
<?php
//$id=$_GET['id'];

require ("mysql_class.php");
$db = new Mysql("localhost", "root", "201122", "userdb");
//$id1 = intval($_GET['id']);
$postid = intval($_GET['id']);
define("TABLENAME", "user_post");
$select = $db -> selectsql(TABLENAME);
$num = $db -> num($select);
for ($i = 0; $i < $num; $i++) {
	$row = $db -> arr($select);
	$id = $row['id'];
	$title = $row['title'];
	$aritle = $row['aritle'];
	if ($id == $postid) {
		echo '<article class="weui-article">
            <h1>' . $title . '</h1>
            <section>
                <section>
                    <p>' . $aritle . '</p>
                </section>
            </section>
        </article>';
	}

}
?>