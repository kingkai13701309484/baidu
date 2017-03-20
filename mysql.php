<?php
//header("Content-type:application/json;charset=utf-8");
require "./config.php";
	$navdata=$_REQUEST["navdata"];
	//$num=$_REQUEST["num"];
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
	// $sql="DELETE FROM `news` WHERE newsid=7";

	// 判断数据是否修改成功
	// $result=$con->query($sql);
	// if (!$result)
	//   {
	//    die('Error: ' . $con->error());
	//   }else{
 //  		echo json_encode(array("msg"=>"提交成功","errorCode"=>"ok"));  	
	//   }
	// 数据显示到前台
	// if ($num=="0") {
	// 		$sql ="SELECT `newsid`, `newstitle`, `newsimg`, `newstext`, `newsdate` , `navdate` FROM `news` WHERE navdate='$navdata' limit 0,5";
	// }else{
	// 	$sql ="SELECT `newsid`, `newstitle`, `newsimg`, `newstext`, `newsdate` , `navdate` FROM `news` WHERE navdate='$navdata' limit 5,10";
	// }
	 $sql ="SELECT `newsid`, `newstitle`, `newsimg`, `newstext`, `newsdate` , `navdate` FROM `news` WHERE navdate='$navdata'";
	$result=$con->query($sql);
	$arr=array();
	while($row = $result->fetch_array())
	  {
	//   echo $row['newsid'] . " " . $row['newstitle'] . " " . $row['newsimg'] . " " . $row['newstext'] . " " . $row['newsdate'];
	//   echo "<br />";
	 array_push($arr, array("newsid"=>$row['newsid'],"newstitle"=>$row['newstitle'],"newsimg"=>$row['newsimg'],"newstext"=>$row['newstext'],"newsdate"=>$row['newsdate']));
	  }
	  $result=array("errcode"=>0,"result"=>$arr);
	  echo json_encode($arr);


$con->close();            //关闭连接


?>

