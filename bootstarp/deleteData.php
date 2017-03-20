<?php
session_start();
//header("Content-type:application/json;charset=utf-8");
require "../config.php";
  	$newsid=$_REQUEST["newsid"];
        $randomData=$_REQUEST["randomData"];
  	// $newstitle=$_REQUEST["newstitle"];
  	// $newsimg=$_REQUEST["newsimg"];
  	// $newstext=$_REQUEST["newstext"];
  	// $newsdate=$_REQUEST["newsdate"];
	// mysqli_select_db("ps", $con);
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



if($randomData==$token){

  if(isset($_SESSION["user"],$_SESSION["pass"])){

	// 删除数据
	$sql="DELETE FROM `news` WHERE newsid=$newsid";
	$con->query($sql);
    // $result=$con->query($sql);
  // if (!$result)
  //   {
  //    die('Error: ' . $con->error());
  //   }else{
  //    echo json_encode(array("msg"=>"提交成功","errorCode"=>"ok"));   
  //   }
  echo json_encode(array("msg"=>"删除成功","errorCode"=>"ok"));

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