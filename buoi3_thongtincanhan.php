
<?php
session_start();
if(isset($_SESSION['tendangnhap'])){
		$tenten = $_SESSION['tendangnhap'];
//("localhost","id12854302_dang","Dang3838404@","id12854302_buoi3");
	$con = new mysqli("localhost","root","","buoi3");
	$con->set_charset("utf8");
	$sql = "SELECT * FROM thanhvien where tendangnhap='$tenten'";
	$result = $con->query($sql);
	$row = $result->fetch_assoc();
	$ten = $row['tendangnhap'];
	$mat = $row['matkhau'];
	$hinhanh = $row['hinhanh'];
	$gt = $row['gioitinh'];
	$nn = $row['nghenghiep'];
	$st = $row['sothich'];
	?>
	
		<!DOCTYPE>
<html>
<head>
	<title> thông tin cá nhân </title>
		<meta charset="utf-8">
		<style type="text/css">
			h1{
			 color  :blue;
			}
			h2{
			 color  :red;
			}
			 table{
			padding: 10px;
			background-color: #yellow;			
		}
	</style>
</head>
<body>

	<table width ="700">
		<tr><td colspan = "2" align="center"><h1>chào bạn <?php echo $ten; ?></h1></td></tr>
		<tr>
			<td rowspan = "4" align="center"><img src="<?php echo './img/' . $hinhanh; ?>" height=”100px″ width=”100px″ ></td>
			<td><h4>tên: <?php echo $ten; ?></h4></td>
		</tr>
		<tr>
			<td><h4>giới tính: <?php echo $gt; ?></h4></td>
		</tr>
		<tr>
			<td><h4>nghề nghiệp: <?php echo $nn?></h4></td>
		</tr>
		<tr>
			<td><h4>sở thích: <?php echo $st?></h4></td>
		</tr>
		<tr>
			<td colspan = "2" align="center"><a href="buoi3_dangxuat.php"><h2>Đăng Xuất</h2><a></td>
		</tr>
	</table>
	<table width ="700">
		
		<tr>
			<td><a href="them_sanpham.php"><h3>Thêm Sản Phẩm </h3></a></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td><a href="danhsach_sanpham.php"><h3>Xem Danh Sách Sản Phẩm</h3></a></td>
		</tr>
		<tr>
			<td><a href="Buoi4_Bai4.php"><h3>Xem Bài 4 Buổi 4</h3></a></td>
		</tr>
	</table>
</body>
</html>
<?php
}else{
	header("Location: buoi3_dangnhap.php");
}
?>