<?php
session_start();
// echo $_SERVER['HTTP_REFERER'];
// die();
require "../config.php";
  	$newsid=addslashes($_REQUEST["newsid"]);
  	$newstitle=addslashes($_REQUEST["newstitle"]);
  	$newsimg=addslashes($_REQUEST["newsimg"]);
  	$newstext=addslashes($_REQUEST["newstext"]);
  	$newsdate=addslashes($_REQUEST["newsdate"]);
  	$navdate=addslashes($_REQUEST["navdate"]);
  	  	$randomData=$_REQUEST["randomData"];

	// 获取数据库中的值
	$sql ="SELECT * FROM `user1`";
	$result=$con->query($sql);
	while ( $row = $result->fetch_array() ) {
		$user=$row['username'];
		$pass=$row['password'];
		$token=$row['token'];
	}

if($randomData==$token){ 	

	if(isset($_SESSION["user"],$_SESSION["pass"])){

	$sql="UPDATE `news` SET `newsid`='$newsid',`newstitle`='$newstitle',`newsimg`='$newsimg',`newstext`='$newstext',`newsdate`='$newsdate',`navdate`='$navdate' WHERE newsid=$newsid";
	//让文字不出现乱码
	//$con->query("set names 'utf8'");
	// 判断数据是否修改成功
	$result=$con->query($sql);
	if (!$result)
	  {
	  	echo mysqli_error($con);
	   //die('Error: ' . $con->error());
	  }else{
  		echo json_encode(array("msg"=>"修改成功","errorCode"=>"ok"));  	
	  }

}
else{
	 header("Location:index1.php");
	 session_destroy();
	// echo "is no";
}

}else{
	header("Location:index1.php");
	session_destroy();
}





$con->close();            //关闭连接

?>