<!DOCTYPE>
<html>
<head>
</head>
<body>
<?php

$tendangnhap =$_POST['ten'];
$matkhau1 = $_POST['password1'];
$matkhau2 = $_POST['password2'];

$hinhanh = $_FILES['hinhanh'];
$tenanh = $hinhanh['name'];
$hinhanhtam = $hinhanh['tmp_name'];
move_uploaded_file($hinhanhtam, './img/' . $tenanh);

$gioitinh = $_POST['gender'];
$nghenghiep = $_POST['dropdown'];
$st ="";
foreach($_POST['sothich'] as $value){
	$st = $st . $value . ", ";
}
$st = trim($st, ', ');


$con = new mysqli("localhost","root","","buoi3");
$con->set_charset("utf8");

$sql = "INSERT INTO thanhvien(tendangnhap,matkhau,hinhanh,gioitinh,nghenghiep,sothich) VALUES ('$tendangnhap','$matkhau1','$tenanh','$gioitinh','$nghenghiep','$st')";

$con->query($sql);

$sql = "SELECT * FROM thanhvien";
$result = $con->query($sql);

echo"<table border = 1>";
while ($row = $result->fetch_assoc()){
	echo"<tr>
		<td>".$row['tendangnhap']."</td>
		<td>".$row['matkhau']."</td>
		<td>".$row['hinhanh']."</td>
		<td>".$row['gioitinh']."</td>
		<td>".$row['nghenghiep']."</td>
		<td>".$row['sothich']."</td>
		</tr>";
};
echo"<table>";

$con->close(); 
header("Location: buoi3_dangnhap.php");
?>
</body>
</html>
