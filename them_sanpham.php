<?php
session_start();
if(isset($_SESSION['tendangnhap'])){
?>
<html>
	<head>
		<title> THÊM SẢN PHẨM </title>
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
		<h1> THÊM SẢN PHẨM<h1>
		<form action="" method="post" enctype="multipart/form-data">
			<table>
				<tr>
				<td> Tên Sảm Phẩm </td>
				<td></td>
				<td><input type="text" name="ten"></td>
			</tr>
			<tr>
				<td> Giá Sản Phẩm </td>
				<td></td>
				<td><input type="number" name="gia"></td>
			</tr>
			<tr>
				<td> Chi Tiết Sản Phẩm</td>
				<td></td>
				<td><textarea name="chitiet"></textarea></td>
			</tr>
			<tr>
				<td>Hình đại diện Sản Phẩm </td>
				<td></td>
				<td><input type="file" name="hinhsp" accept="image/*" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value ="them san pham"></td>
			</tr>
			</table>
		</from>
		<?php
		
		if(isset($_POST['submit'])){
			$tensp = $_POST['ten'];
			$giasp = $_POST['gia'];
			$ctsp = $_POST['chitiet'];
			$hinh = $_FILES['hinhsp']['name'];
			$tentv = $_SESSION['tendangnhap'];
			
			move_uploaded_file($_FILES['hinhsp']['tmp_name'], './img/'. $_FILES['hinhsp']['name']);
			
			$con = new mysqli("localhost","root","","buoi3");
			$con->set_charset("utf8");
			$spl = "SELECT id from thanhvien where tendangnhap='$tentv'";
			$con->query($spl);
			$kq = $con->query($spl);
			$idtv = $kq->fetch_assoc()['id'];
			
			$spl2 = "INSERT INTO sanpham(tensp,giasp,chitietsp,hinhanhsp,idtv) VALUES('$tensp','$giasp','$ctsp','$hinh','$idtv')";
			$con->query($spl2);
			$con->close();
			header("Location: danhsach_sanpham.php");
			}
			
		?>
	</body>
</html>
<?php }else{
	header("Location: buoi3_dangnhap.php");
} ?>