<?php
    $id = $_REQUEST['t'];
    $con = new mysqli("localhost","root","","buoi3");
    $con->set_charset("utf8");
    
    $sql = "SELECT * FROM sanpham WHERE idsp='$id'";
    
    $result = $con->query($sql);
    
	$row = $result->fetch_assoc();
    echo "<img src='img/" .$row['hinhanhsp']. "'>";
    $con->close();
?>