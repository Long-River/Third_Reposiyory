<?php

	require_once'Handle_Stu_Message.php';
	require_once'conn.php';  
	require_once'Incision_UserMessage.php';
	header("Content-Type: text/html; charset=utf-8");

	
    	Response_Username();   //首先执行get响应

		if($bol) //服务端已经接受到了合法的用户名
		{

			connect("10.10.10.73","panther","panther123","CampusCircle"); //连接到本地数据库
			// mysql_query("SET NAMES UTF8"); //设置数据库中文本的编码格式
			// $bool = mysql_query("INSERT INTO list VALUES('苏洵','2014041111','19','河南','')");
		 //    var_dump($bool);
			
			//在数据库中检索这个用户名是否存在			
			$sql = "SELECT *FROM Student WHERE StudentID = $UserName ";
			
			$result = mysql_query($sql,$conn);
			$row = mysql_num_rows($result);  //$row的值为满足条件的数据量
			
			if($row != 0)
			{
				Response_Password($sql);  //调用密码比对的这个函数
			}
			else 
				echo json_encode(array('Exist_In_Database?'=>'No'));
			mysql_close($conn);  //关闭数据库

		}  
	    else
		{
			echo json_encode(array(
				'state' => 'false'
				));		
		}

		
	
?>