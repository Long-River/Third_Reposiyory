<?php
		//----------------------------------------------------------------------------			
		


		
		require_once'Incision_UserMessage.php';
		
		

		function  Response_Username()   //该函数执行成功之后，说明服务端已经接受到了合法的用户名
		{	
			global $bol;
		    $bol = false;

			if(!isset($_GET['usermessage']))  //如果没有接受到信息
			{
				
				echo  json_encode(array('UserName'=>'false'));
			}
			else   //如果接受到一个信息
			{	
				$UserMessage = $_GET['usermessage'];

				//正则表达式 判断用户名的合法性	
				function replace_specialChar($strParam)
				{
					$regex = "/\/|\~|\!|\@|\#|\\$|\%|\^|\&|\*|\(|\)|\+|\{|\}|\:|\<|\>|\?|\[|\]|\,|\.|\/|\;|\'|\`|\-|\=|\\\|\|/";
					return preg_replace($regex,"",$strParam);
				}
				//只切割一次
				Incision($UserMessage);  //切割$UserMessage，得到用户名和密码
				//====================================================================================
				
				
				$userName = $GLOBALS['UserName'];
				
				
				$str = $userName;   //把用户名先赋值str 本意是不想更改username的初始值
				
				$str_temp = $str;
				$str = replace_specialChar($str);
				
				if($str_temp != $str)    //如果我接受到的这个用户名不是合法的用户名
				{
					 
					echo json_encode(array('userName'=>'illegal'));  
				}
				else 
			    {
					//echo json_encode(array('userName'=>'Exist'));		
					$bol = true;   //只有接收到合法的用户名，才把$bol值设为true
				}	
		 	}
		 }//---------------------------------------------------------------------------
		function  Response_Password($sql)   //该函数执行成功之后，说明服务端已经接受到了用户密码
		{
				$result = mysql_query($sql);
				$row = mysql_fetch_array($result);  //遍历数据库中的数据
				//根据用户名从数据库中获取密码
				$Pas = $row['Password'];    //从数据库中提取密码
				
				$str_encryption1 = md5($Pas); //一次加密
				$str_Time = (int)(time()/120); //获取时间戳
				$str_joint = $str_encryption1.$str_Time; //密码拼接重组
				$str_encryption2 = md5($str_joint);  //二次加密
				
				$ss = "123456";
				$passWord = $GLOBALS['Password'];
				if($passWord == $str_encryption2)   //比较用户密码
				{	
					echo json_encode(array(
					'Login_State'=>'true'
					));	
				}
				else
				{	
					echo json_encode(array(	
					'Login_State'=>'false'
					));	
					
				}
			
		}//---------------------------------------------------------------------------
									
?>