<?php
    require ("mysql_class.php");
    $db = new Mysql("localhost", "root", "201122", "userdb");
    if (isset($_POST["title"]) && isset($_POST["aritle"])) {
    	//$db = new Mysql("localhost", "root", "201122", "userdb");
	    $title=$_POST["title"];
	    $aritle=$_POST["aritle"];
		session_start();
		$user_id=$_SESSION['user_id'];
		define("TABLENAME", "user_post");
        define("COLE", "(user_id,title,aritle)");
	    define("DATEE", "('$user_id','$title','$aritle')");
	   //判断文章标题内容是否为空
	    if(!$db->isnull2($title, $aritle)){
		    $data=array(
		        "code"=>1,
		        "msg"=>"参数为空",
		);
		die(json_encode($data));
	    }else{
		//插入文章标题内容
		$insert=$db->insert(TABLENAME, COLE, DATEE);
	    }
	    $data=array(
	        "code"=>0,
	        "msg"=>"发布成功",
	        "user_id"=>$user_id,
	    );
        die(json_encode($data));
}
?>