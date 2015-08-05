<?php   
	

 //  数据库连接函数
 //  形参1:所需要连接的服务器
 //  形参2:用户名,默认值是服务器进程所有者的用户名
 // 形参3:密码
 // 形参4:需要连接的数据库的名字
    function connect ($server,$user,$pwd,$database)
    {		
      header("Content-Type: text/html; charset=UTF-8");//强制转换为UTF-8编码格式
    	global $conn;
 	    $conn = mysql_connect("$server","$user","$pwd") or die("数据库链接错误".mysql_error()); //连接数据库
 		  mysql_select_db("$database",$conn) or die("数据库访问错误".mysql_error()); //异常处理
 		//mysql_query("SET NAMES UTF-8");  //设置编码格式
  	} 
?>  