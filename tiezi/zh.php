<?php
$link=mysql_connect("localhost","root","201122");//链接数据库
    header("Content-type:text/html;charset=utf-8");
	$select=mysql_select_db("userdb",$link);//选择数据库
	
if($link)
  {  
    //echo"链接数据库成功";
    
    if($select)
    {
    //  echo"选择数据库成功！";
      if(isset($_POST["sub"]))
      {
        $name=$_POST["username"];
        $password1=$_POST["pass1"];//获取表单数据
        $password2=$_POST["pass2"];
        if($name==""||$password1=="")//判断是否填写
        {
          echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."请填写完成！"."\"".")".";"."</script>";
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."index.html"."\""."</script>";    
          exit;
        }
        if($password1==$password2)//确认密码是否正确
        {
        $str="select count(*) from zhuce where username="."'"."$name"."'";
        $result=mysql_query($str,$link);
        $pass=mysql_fetch_row($result);
        $pa=$pass[0];
        if($pa==1)//判断数据库表中是否已存在该用户名
        {
         
        echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."该用户名已被注册"."\"".")".";"."</script>";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."index.html"."\""."</script>";   
        exit; 
        }
         
         
        mysql_query('SET NAMES UTF8');
        $sql="insert into zhuce(username,password,password2) values("."\""."$name"."\"".","."\""."$password1"."\"".","."\""."$password2"."\"".")";//将注册信息插入数据库表中
        
       // echo"$sql";
       if( mysql_query($sql,$link)){
       	echo "注册成功";
       }
		
        
        $close=mysql_close($link);
		
//      if($close)
//      {
            //echo"数据库关闭";
          //  echo"注册成功！";
          //echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://127.0.0.1:8080/return.html"."\""."</script>";    
       // }
        }
        else
        {
          echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."密码不一致！"."\"".")".";"."</script>";
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."index.html"."\""."</script>";    
        }
      }
    }
  }
?>