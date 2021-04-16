<?php
	$id=$_GET['idsp'];
//("localhost","id12854302_dang","Dang3838404@","id12854302_buoi3");
	$con = new mysqli("localhost","root","","buoi3");
	$con->set_charset("utf8");
	$sql = "DELETE FROM sanpham where idsp = '$id'";
	$con->query($sql);
	header("Location: nl_dsma.php.php");
?>