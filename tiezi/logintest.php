<?php
require ("mysql_class.php");
$db = new Mysql("localhost", "root", "201122", "userdb");
if (isset($_POST["username"]) && isset($_POST["pass1"])) {
	//获取表单数据
	$username = $_POST["username"];
	$pass1 = $_POST["pass1"];
	define("SEL", "where username='$username'");
	define("TABLENAME", "user_register");
	define("COLE", "(username,password)");
	define("DATEE", "('$username','$pass1')");
	//信息是否为空
	if (!$db -> isnull2($username, $pass1)) {
		$data = array("code" => 1, "msg" => "参数为空", );
		die(json_encode($data));
	}

	//查询是否存在该用户
	$sel = $db -> selectcon(TABLENAME, SEL);
	$row = $db -> arr($sel);
	$num = $db -> num($sel);
	if ($num == 1) {
		session_start();
		$_SESSION['user_id']=$row['user_id'];
		$_SESSION['username']=$row['username'];
		$_SESSION['password']=$row['password'];
//		$id = $row['user_id'];
//		$u1 = $row['username'];
//		$p1 = $row['password'];
		
		if ($username == $row['username'] && $pass1 == $row['password']) {
			$data = array("code" => 0, "msg" => "登录成功", "id" =>$row['user_id'], );
			die(json_encode($data));
		} else {
			$data = array("code" => 1, "msg" => "用户名或密码错误", );
			die(json_encode($data));
		}
	}else{
		$data = array("code" => 1, "msg" => "用户名不存在", );
			die(json_encode($data));
	}

	$db -> dbClose();

}
?>