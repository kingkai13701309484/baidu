<?php
require "../config.php";
	// $token=$_REQUEST["token"];
		// 将数据显示到前台
	
		$sql ="SELECT * FROM user1";
		$result=$con->query($sql);
		$arr=array();
		while($row = $result->fetch_array())
		  {
		 	$arr=array("token"=>$row['token']);
		  }
	  	echo json_encode($arr);



$con->close();            //关闭连接


?>