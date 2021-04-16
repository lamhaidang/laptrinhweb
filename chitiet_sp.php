<?php
session_start();
if(isset($_SESSION['tendangnhap'])){
	$id=$_GET['idsp'];
		$tenten = $_SESSION['tendangnhap'];
//("localhost","id12854302_dang","Dang3838404@","id12854302_buoi3");
	$con = new mysqli("localhost","root","","buoi3");
	$con->set_charset("utf8");
	$sql = "SELECT * FROM sanpham where idsp = '$id'";
	$result = $con->query($sql);
	$row = $result->fetch_assoc();
?>




<html>
	<head>
		<title> CHI TIẾT SẢN PHẨM </title>
		<meta charset="utf-8">
		<style type="text/css">
			h1{
			 color  :red;
			}
			table{
			padding: 10px;
			background-color: #D3D3D3;
			
		}
		</style>
	</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data">
			<table width ="700">
		<tr><td colspan = "2" align="center"><h1>chào bạn <?php echo $tenten ?></h1></td></tr>
		<tr>
			<td rowspan = "4" align="center"><img src="<?php echo './img/' . $row['hinhanhsp']; ?>" width="200px" ></td>
		</tr>
		<tr>
			<td><h4>TÊN CỦA SẢN PHẨM : <?php echo $row['tensp']; ?></h4></td>
		</tr>
		<tr>
			<td><h4>GIÁ TIỀN CỦA SẢN PHẨM : <?php echo $row['giasp']?></h4></td>
		</tr>
		<tr>
			<td><h4>CHI TIẾT CỦA SẢN PHẨM : <?php echo $row['chitietsp']?></h4></td>
		</tr>
		<tr>
			<td colspan = "2" align="center"><a href="buoi3_dangxuat.php"><h2>Đăng Xuất</h2><a></td>
		</tr>
	</table>
		</form>
	</body>
</html>
<?php } ?>