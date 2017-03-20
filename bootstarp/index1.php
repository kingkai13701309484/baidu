<?php
// header("Content-type:text/html;charset=utf-8");

// 开启session存储
session_start();  

// 调用公共配置
require "../config.php";

// 判断referer的来源是否正确，做跳转的时候用
if($_SERVER['HTTP_REFERER']=="http://localhost/baidu/bootstarp/index.html")   { 


// 获取前端传过来的数据
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$textfield=$_REQUEST['textfield'];



// 获取数据库中的值
$sql ="SELECT * FROM `user1`";
$result=$con->query($sql);
while ( $row = $result->fetch_array() ) {
	$user=$row['username'];
	$pass=$row['password'];
}


// 进行前端数据判断并输出结果
if($username==$user&&$password==$pass&&strtoupper($textfield) == strtoupper($_SESSION["VerifyCode"])){
	echo json_encode(array("msg"=>"登录成功","errorCode"=>"ok"));

	// session存储数据
	$_SESSION["user"]=$user;
	$_SESSION["pass"]=$pass;
	// header("location:mysql.php");

	// 生成个随机数token
	// $num;
	$arr=array();
	$count1=0;
	$count = 0;
	$return = array();
	while ($count < 9) 
	 {
	  $return[] = mt_rand(1, 9);
	  $return = array_flip(array_flip($return));
	  $count = count($return);
	 } //www.jb51.net
	// foreach($return as $value)
	//  {
	//   echo $value." ";
	//  }
	// echo "<br/>";
	$arr=array_values($return);// 获得数组的值 
	// foreach($arr as $key){
	// 	echo $key;
	// }
	$num=join($arr);
	$nums=intval($num);
	// echo json_encode($nums);

	// 修改token的数据
	// $sql1="INSERT INTO `user1`(`token`) VALUES ('".$nums."')"; 
	$sql1="UPDATE `user1` SET `token`='$nums' WHERE userid=1";
		//让文字不出现乱码
		//$con->query("set names 'utf8'");
		$result1=$con->query($sql1);


		// if (!$result1)
		//   {
		//   	echo mysqli_error($con);
		//    //die('Error: ' . $con->error());
		//   }else{
	 //  		// echo json_encode(array("msg"=>"提交成功","errorCode"=>"ok"));  	
		//   }


}
else if($username!==$user&&$password!==$pass&&strtoupper($textfield) !== strtoupper($_SESSION["VerifyCode"])){
	echo json_encode(array("msg"=>"输入的信息有误","errorCode"=>"ok"));
	// session_destroy();
}
else if($username!==$user&&$password!==$pass){
	echo json_encode(array("msg"=>"输入的用户名和密码错误","errorCode"=>"ok"));
	// session_destroy();
}
else if($username!==$user&&strtoupper($textfield) !== strtoupper($_SESSION["VerifyCode"])){
	echo json_encode(array("msg"=>"输入的用户名和验证码错误","errorCode"=>"ok"));
	// session_destroy();
}
else if($password!==$pass&&strtoupper($textfield) !== strtoupper($_SESSION["VerifyCode"])){
	echo json_encode(array("msg"=>"输入的密码和验证码错误","errorCode"=>"ok"));
	// session_destroy();
}
else if($username!==$user){
	echo json_encode(array("msg"=>"输入的用户名错误","errorCode"=>"ok"));
	// session_destroy();
}
else if($password!==$pass){
	echo json_encode(array("msg"=>"输入的密码错误","errorCode"=>"ok"));
	// session_destroy();
}
else if(strtoupper($textfield) !== strtoupper($_SESSION["VerifyCode"])){
	echo json_encode(array("msg"=>"输入的验证码错误","errorCode"=>"ok"));
	// session_destroy();
}








// 先清空上一次的数据
// $sqlDele="DELETE FROM `login` WHERE 1";
// $con->query($sqlDele);







$con->close();            //关闭连接

// }else{
// 	  print "You didn't click any links to get here";
// }


}



?>