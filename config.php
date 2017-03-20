<?php
$con = new mysqli("localhost","root","","ps");
if (!$con)
  {
  die('Could not connect: ' . $con->error());
  }
$con->query("set names 'utf8'");

	
?>
