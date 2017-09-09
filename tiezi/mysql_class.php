<?php
header("content-type:text/html;charset=utf-8");
class Mysql {
	private $host;
	//服务器地址
	private $root;
	//用户名
	private $password;
	//密码
	private $database;
	//数据库名

	//通过构造函数初始化类
	function Mysql($host, $root, $password, $database) {
		$this -> host = $host;
		$this -> root = $root;
		$this -> password = $password;
		$this -> database = $database;
		$this -> connect();
	}

	function connect() {
		$this -> conn = mysql_connect($this -> host, $this -> root, $this -> password);
		//		if($this->conn){
		//			echo "连接mysql成功";
		//		}else{
		//			echo "连接mysql失败";
		//		}
		//		$this->conn=
		mysql_select_db($this -> database, $this -> conn);
		//		if($this->conn){
		//			echo "连接db成功";
		//		}else{
		//			echo "连接db失败";
		//		}
		mysql_query("set names utf8");
	}

	function dbClose() {
		mysql_close($this -> conn);
	}

	function query($sql) {
		return mysql_query($sql);
	}

	function row($result) {
		return mysql_fetch_row($result);

	}

	function arr($result) {
		return mysql_fetch_array($result);
	}
    function ass($result) {
		return mysql_fetch_assoc($result);
	}
	function num($result) {
		return mysql_num_rows($result);
	}

	function select($tableName, $condition) {
		return $this -> query("SELECT COUNT(*) FROM $tableName $condition");
	}

	function selectsql($tableName) {
		return $this -> query("SELECT * FROM $tableName");
	}

	function selectcon($tableName, $condition) {
		return $this -> query("SELECT * FROM $tableName $condition");
	}

	function insert($tableName, $fields, $value) {
		$this -> query("INSERT INTO $tableName $fields VALUES$value");
	}

	function update($tableName, $change, $condition) {

		$this -> query("UPDATE $tableName SET $change $condition");

	}

	function isnull($input1, $input2, $input3) {
		if ($input1 == "" || $input2 == "" || $input3 == "") {
			return false;
		} else {
			return true;
		}
	}

	function isnull2($input1, $input2) {
		if ($input1 == "" || $input2 == "") {
			return false;
		} else {
			return true;
		}
	}

	function issame($password1, $password2) {
		if ($password1 != $password2) {
			return false;
		} else {
			return true;
		}
	}

}
?>