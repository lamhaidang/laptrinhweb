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
	<form method="post" enctype="multipart/form-data" onsubmit="return baoloi()">
		 <table>
			<tr>
				<td>Tên Đăng Nhập </td>
				<td></td>
				<td><input type="text" name="ten" id ="tendn"></td>
			</tr>
			<tr><td colspan ="3"><p align = "right" style="color:red" id="tdn"></p></td></tr>
			<tr>
				<td>Mật Khẩu </td>
				<td></td>
				<td><input type="password" name="password" id ="mkdn"></td>
			</tr>
			<tr><td colspan ="3"><p align = "right" style="color:red" id="mk"></p></td></tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value ="Đăng Nhập" ></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
		</table>
	</form>
	<h2>chuyển sang trang <a  href="Buoi4_Bai1_DangKy.html">ĐĂNG KÝ</a></h2>
<script>
	function baoloi(){
		var uses = document.getElementById("tendn").value;
		var mk = document.getElementById("mkdn").value;
		ok = true;
		if(uses==""){
			document.getElementById("tdn").innerHTML="Tên Đăng Nhập Không Được Để Trống";
			ok = false;
		} else{
			document.getElementById("tdn").innerHTML="";
		}
		if(mk==""){
			document.getElementById("mk").innerHTML="Mật Khẩu Không Được Để Trống";
			ok = false;
		}else{
			document.getElementById("mk").innerHTML="";
		}
		return ok;
	}
</script>
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