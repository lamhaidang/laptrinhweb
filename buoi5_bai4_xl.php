<?php
	if(isset($_GET['t'])){
		$id = $_GET['t'];
		$con = new mysqli("localhost","root","","buoi3");
		$con->set_charset("utf8");
		
		$sql = "SELECT * FROM sanpham WHERE tensp like '%$id%'";
		
		$result = $con->query($sql);
		
		while($row = $result->fetch_assoc()){
		echo "<p style='text-align : center'>".$row['tensp']."</p>";
		}
		//echo $id;
		$con->close();
	}
?>