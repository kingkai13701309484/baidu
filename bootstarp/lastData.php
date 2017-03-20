<?php
//header("Content-type:application/json;charset=utf-8");
session_start();
require "../config.php";
  	$randomData=$_REQUEST["randomData"];

	// 获取数据库中的值
	$sql1 ="SELECT * FROM `user1`";
	$result1=$con->query($sql1);
	while ( $row1 = $result1->fetch_array() ) {
		$user=$row1['username'];
		$pass=$row1['password'];
		$token=$row1['token'];
	}

if($randomData==$token){

	if(isset($_SESSION["user"],$_SESSION["pass"])){
  	// $newstitle=$_REQUEST["newstitle"];
  	// $newsimg=$_REQUEST["newsimg"];
  	// $newstext=$_REQUEST["newstext"];
  	// $newsdate=$_REQUEST["newsdate"];
	// mysqli_select_db("ps", $con);
	//让文字不出现乱码
	//$con->query("set names 'utf8'");
	// 添加数据
	// $sql="INSERT INTO `news`(`newstitle`, `newsimg`, `newstext`, `newsdate`) VALUES ('s','d','f','v')"; 
	// $sql="INSERT INTO `news`(`newstitle`, `newsimg`, `newstext`, `newsdate`) VALUES ('".$newstitle."','".$newsimg."','".$newstext."','".$newsdate."')"; 
	// 改数据
	// $sql="UPDATE `news` SET `newstitle`='我是',`newsimg`='修改',`newstext`='的',`newsdate`='内容' WHERE newsid=8";
	// 删除数据
	// $sql='DELETE FROM `news` WHERE newsid=7';

	// 判断数据是否修改成功
	// $result=$con->query($sql);
	// if (!$result)
	//   {
	//    die('Error: ' . $con->error());
	//   }else{
 //  		echo json_encode(array("msg"=>"提交成功","errorCode"=>"ok"));  	
	//   }
	// 数据显示到前台
	$sql ="SELECT * FROM news";
	//$sql = "select * from news order by id desc limit 1";//$sql = "ELECT * FROM news ORDER BY id DESC LIMIT 0,1";获取news中的数据，并按id倒叙排列，取其中1条
	$result=$con->query($sql);
	$arr=array();
	while($row = $result->fetch_assoc())
	  {
	//   echo $row['newsid'] . " " . $row['newstitle'] . " " . $row['newsimg'] . " " . $row['newstext'] . " " . $row['newsdate'];
	//   echo "<br />";
	 array_push($arr, array("newsid"=>$row['newsid'],"newstitle"=>$row['newstitle'],"newsimg"=>$row['newsimg'],"newstext"=>$row['newstext'],"newsdate"=>$row['newsdate'],"navdate"=>$row['navdate']));
	  }
	  $result=array("errcode"=>0,"result"=>$arr);
	  echo json_encode($arr);
}
else{
	 header("Location:index1.php");
	 session_destroy();
	// echo "is no";
}

else{
	header("Location:index1.php");
	session_destroy();
}


$con->close();            //关闭连接


?>