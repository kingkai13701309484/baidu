<?php
session_start();
require "../config.php";
  	$newsid=$_REQUEST["newsid"];
  	$newstitle=$_REQUEST["newstitle"];
  	$newsimg=$_REQUEST["newsimg"];
  	$newstext=$_REQUEST["newstext"];
  	$newsdate=$_REQUEST["newsdate"];
  	$navdate=$_REQUEST["navdate"];
  	$randomData=$_REQUEST["randomData"];
	//让文字不出现乱码
	//$con->query("set names 'utf8'");

	// 获取数据库中的值
	$sql ="SELECT * FROM `user1`";
	$result=$con->query($sql);
	while ( $row = $result->fetch_array() ) {
		$user=$row['username'];
		$pass=$row['password'];
		$token=$row['token'];
	}




	// 数据显示到前台
	// $sql ="SELECT * FROM news WHERE newsid='$newsid',newstitle='$newstitle',newsimg='$newsimg',newstext='$newstext',newsdate='$newsdate'";
	// $sql ="SELECT `newsid`, `newstitle`, `newsimg`, `newstext`, `newsdate` FROM `news` WHERE newsid=$newsid";
if($randomData==$token){

	if(isset($_SESSION["user"],$_SESSION["pass"])){

	if ($newsid!="") {
		$sql ="SELECT `newsid`, `newstitle`, `newsimg`, `newstext`, `newsdate` , `navdate` FROM `news` WHERE newsid='$newsid'";
		
	}else if($newstitle!=""){
		$sql ="SELECT `newsid`, `newstitle`, `newsimg`, `newstext`, `newsdate` , `navdate` FROM `news` WHERE newstitle='$newstitle'";	

	}else if($newsimg!=""){
		$sql ="SELECT `newsid`, `newstitle`, `newsimg`, `newstext`, `newsdate` , `navdate` FROM `news` WHERE newsimg='$newsimg'";	

	}else if($newstext!=""){
		$sql ="SELECT `newsid`, `newstitle`, `newsimg`, `newstext`, `newsdate` , `navdate` FROM `news` WHERE newstext='$newstext'";	
			
	}else if($newsdate!=""){
		$sql ="SELECT `newsid`, `newstitle`, `newsimg`, `newstext`, `newsdate` , `navdate` FROM `news` WHERE newsdate='$newsdate'";		
	}else if($navdate!=""){
		$sql ="SELECT `newsid`, `newstitle`, `newsimg`, `newstext`, `newsdate` , `navdate` FROM `news` WHERE navdate='$navdate'";		
	}

	//$result=$con->query($sql);
	$result=$con->query($sql);
	$arr=array();
	while($row = $result->fetch_array())
	  {
	//   echo $row['newsid'] . " " . $row['newstitle'] . " " . $row['newsimg'] . " " . $row['newstext'] . " " . $row['newsdate'];
	//   echo "<br />";
	 array_push($arr, array("newsid"=>$row['newsid'],"newstitle"=>$row['newstitle'],"newsimg"=>$row['newsimg'],"newstext"=>$row['newstext'],"newsdate"=>$row['newsdate'],"navdate"=>$row['navdate']));
	  }
	  //$result=array("errcode"=>0,"result"=>$arr);
	  echo json_encode($arr);

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