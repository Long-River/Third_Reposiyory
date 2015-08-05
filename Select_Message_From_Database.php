


<?php
	
	header("Content-Type: text/html; charset=utf-8");//强制转换为UTF-8编码格式
	require_once'conn.php';
	if(isset($_GET['var']))
	{
		$var = $_GET['var'];
		Select($var);
		
	}
	//根据传递进来的数据 从数据库中找到其他需要的信息
    //例如：传递进来一个学生学号 我们想要知道该学生的名字，年龄等等
	function Select($var)
	{
		connect("10.10.10.73","panther","panther123","CampusCircle");
		//connect("localhost","root","root","pan");

		mysql_query("SET NAMES UTF8");   //可以矫正从数据库读出数据到浏览器上显示乱码的错误，其位置为connect函数后
		$result = mysql_query("SELECT *FROM Student WHERE StudentID = $var");
		$row = mysql_fetch_array($result);    	
    	if($row)
  		{
  			echo json_encode(array(
  				'昵称' => $row['niCheng'],
  				'学号' => $row['StudentID'],
  				'学校'=>$row['xueXiao'],
  				'系别'=>$row['xiBie'],
  				'性别'=>$row['sex'],
  				'职务'=>$row['zhiWu'],
  				'入学时间'=>$row['ruXueNianFen']));
  			
  		}
	}
	

?>