<!DOCTYPE>
<html>
<head>
	<title> Form Đăng Nhập </title>
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
	<h1>Đăng Nhập</h1>
	<h2> Lâm Hãi Đăng B1706460</h2>
	<form method="post" enctype="multipart/form-data">
		 <table>
			<tr>
				<td>Tên Đăng Nhập </td>
				<td></td>
				<td><input type="text" name="ten"></td>
			</tr>
			<tr>
				<td>Mật Khẩu </td>
				<td></td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value ="Đăng Nhập"></td>
			</tr>
		</table>
	</from>

<?php
if(isset($_POST['submit'])){
$tenten = $_POST['ten'];
echo $tenten."<br>";
$matmat = $_POST['password'];
echo $matmat."<br>";


$con = new mysqli("localhost","root","","buoi3");
$con->set_charset("utf8");

$sql = "SELECT tendangnhap,matkhau FROM thanhvien";
$result = $con->query($sql);

$kt = 0;
while ($row = $result->fetch_assoc()){
	$kiemtra = ($row['tendangnhap'] == $tenten && $row['matkhau'] == $matmat);
	if($kiemtra == true){
		$kt = 1;
	}
}
if($kt == 1){
	echo'Đăng Nhập Thành Công';
	session_start();
	$_SESSION['tendangnhap'] = $tenten;
	header("Location: buoi3_thongtincanhan.php");
}
else{
	echo 'đăng nhập thất bại mời đăng nhập lại';
}
		
$con->close();
}
?>
</body>
</html>