<?php
// echo $_SERVER['HTTP_REFERER'];
// die();
// if (strpos($_SERVER['HTTP_REFERER'], 'http://localhost/baidu/bootstarp/index.html')  !== false) {


session_start();
//header("Content-type:application/json;charset=utf-8");
require "../config.php";
  	$randomData=$_REQUEST["randomData"];
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

  // function   checkurl(){   
  // //如果直接从浏览器连接到页面，就连接到登陆窗口   
  // //echo   "referer:".$_SESSION['HTTP_REFERER'];   
  // if(!isset($_SESSION['HTTP_REFERER']))   {   
  // header("location:   index1.php");   
  // exit;   
  // }   
  // // $urlar   =   parse_url($_SESSION['HTTP_REFERER']);   
  // // //如果页面的域名不是服务器域名,就连接到登陆窗口   
  // // if($_SERVER['HTTP_HOST']   !=   $urlar["host"]   &&   $urlar["host"]   !=   "202.102.110.204"   &&   $urlar["host"]   !=   "http://blog.163.com/fantasy_lxh/")   {   
  // // header("location:   index1.php");   
  // // exit;   
  // // }     
  // }   
// checkurl();

// if(isset($_SESSION['HTTP_REFERER']))   { 


	
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


	// 数据显示到前台
	$sql ="SELECT * FROM news";
	$result=$con->query($sql);
	$arr=array();
	while($row = $result->fetch_array())
	  {
	//   echo $row['newsid'] . " " . $row['newstitle'] . " " . $row['newsimg'] . " " . $row['newstext'] . " " . $row['newsdate'];
	//   echo "<br />";
	 array_push($arr, array("newsid"=>$row['newsid'],"newstitle"=>$row['newstitle'],"newsimg"=>$row['newsimg'],"newstext"=>$row['newstext'],"newsdate"=>$row['newsdate'],"navdate"=>$row['navdate']));
	  }
	  $result=array("errcode"=>0,"result"=>$arr);
	  echo json_encode($arr);

$con->close();            //关闭连接

}
else{
	 header("Location:index1.php");
	 session_destroy();
	// echo "is no";
}

// session_destroy();   销毁session

// }else{
// 	  print "You didn't click any links to get here";
// }

//     } else {
//                     print "You didn't click any links to get here
// ";
//             }
}else{
	header("Location:index1.php");
	session_destroy();
}





?>

