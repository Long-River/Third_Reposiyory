<?php
	
	//header("Content-Type: text/html; charset=UTF-8");
    //UserMessage切割 得到用户名和密码
	
	function Incision($UserMessage)
	{	
		$str = $UserMessage;
		$arr = explode("$",$str); 
		$User_Pas_Array = array();//定义空数组变量
	    global $UserName;  //全局变量 保存用户名	
	    global $Password;  //全局变量 保存密码
		$UserName = $arr[0];
		$Password = $arr[1];
		
	}
?>