<?php
require ("mysql_class.php");
$db = new Mysql("localhost", "root", "201122", "userdb");
if (isset($_POST["username"]) && isset($_POST["pass1"]) && isset($_POST["pass2"])) {
	//获取表单数据
	$username = $_POST["username"];
	$pass1 = $_POST["pass1"];
	$pass2 = $_POST["pass2"];
	define("SEL", "where username='$username'");
	define("TABLENAME", "user_register");
	define("COLE", "(username,password,password2)");
	define("DATEE", "('$username','$pass1','$pass2')");
	//信息是否为空
	if (!$db -> isnull($username, $pass1, $pass2)) {
		$data = array("code" => 1, "msg" => "参数为空", );
		die(json_encode($data));
	}
	//密码是否一致
	if (!$db -> issame($pass1, $pass2)) {//密码不一致
		$data = array("code" => 1, "msg" => "两次密码不一致", );
		die(json_encode($data));

	} else {
		//查询是否有相同的用户名
		$sel = $db -> select(TABLENAME, SEL);
		$row = $db -> row($sel);
		$r1 = $row[0];
		if ($r1 == 1) {
			$data = array("code" => 1, "msg" => "用户重名", );
			die(json_encode($data));
		}

		//插入用户信息
		$insert = $db -> insert(TABLENAME, COLE, DATEE);
		$sel = $db -> select(TABLENAME, SEL);
		$row = $db -> row($sel);
		$r2 = $row[0];
		if ($r2 != 1) {
			$data = array("code" => 1, "msg" => "注册失败", );
			die(json_encode($data));
		}
//		$select = $db -> selectcon(TABLENAME, SEL);
//		$arr = $db -> arr($select);
//		$id = $arr['user_id'];
		$db -> dbClose();
//		$data = array("code" => 0, "msg" => "注册成功", "id"=>$id );
//		die(json_encode($data));

	}
		$data = array("code" => 0, "msg" => "注册成功", );
		die(json_encode($data));
}
?>