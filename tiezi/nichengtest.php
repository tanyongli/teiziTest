<?php
require ("mysql_class.php");
$db = new Mysql("localhost", "root", "201122", "userdb");

if (isset($_POST["nicheng"]) && isset($_POST["geqian"])) {
	$nicheng = $_POST['nicheng'];
	$geqian = $_POST['geqian'];
	$id=$_POST['id'];
	$image = mysql_escape_string(file_get_contents($_FILES['tupian']['tmp_name']));
	$type = $_FILES['tupian']['type'];
	define("TABLENAME", "user_nickname");
	define("COL", "(user_id,nickname,sign,type,binarydata)");
	define("VAL", "('$id','$nicheng','$geqian', '$type','$image')");
	define("CON","where user_id='$id'");
	define("COLE","nickname='$nicheng',sign='$geqian',type='$type',binarydata='$image'");
	if (!$db -> isnull2($nicheng, $geqian)) {
		$data = array("code" => 1, "msg" => "参数为空", "id"=>$id );
		die(json_encode($data));
	} else {
		$select=$db->select(TABLENAME, CON);
		$num=$db->row($select);
		if($num[0]==1){//已存在user_id，更新操作
			$up=$db->update(TABLENAME, COLE, CON);
		}else{//执行插入操作
			$insert = $db -> insert(TABLENAME, COL, VAL);
		}
	}
	//再查一遍得到user_nickname的主键id
//	$sel=$db->selectcon(TABLENAME,CON);
//	$arr=$db->arr($sel);
//	$nick_id=$arr['id'];
	$data = array("code" => 0, "msg" => "发布成功","id"=>$id);
	die(json_encode($data));
}
?>