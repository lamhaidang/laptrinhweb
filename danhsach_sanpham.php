
<?php
session_start();
if(isset($_SESSION['tendangnhap'])){
		$tenten = $_SESSION['tendangnhap'];
//("localhost","id12854302_dang","Dang3838404@","id12854302_buoi3");
	$con = new mysqli("localhost","root","","buoi3");
	$con->set_charset("utf8");
	$sql = "SELECT * FROM sanpham ";
	$result = $con->query($sql);
	
?>




<html>
	<head>
		<title> DANH SÁCH SẢN PHẨM </title>
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
			<table border = 1>
				<tr><td colspan = "6" align="center"><h1>chào bạn <?php echo $tenten; ?></h1></td></tr>
				<tr><td colspan = "6" align="center"><h3> DANH SÁCH SẢN PHẨM CỦA BẠN LÀ <h3></td></tr>
				<tr>
					<td> STT </td>
					<td>TÊN SẢN PHẨM</td>
					<td>GIÁ SẢN PHẨM</td>
					<td colspan = "3">CHI TIẾT</td>
				</tr>
				<?php
				$i = 1;
					while($row = $result->fetch_assoc()){
						
				?>
				<tr>
					<td> <?php echo $i++; ?> </td>
					<td><?php echo $row['tensp']?></td>
					<td><?php echo $row['giasp']?></td>
					<td><a href="chitiet_sp.php?idsp=<?php echo $row['idsp'] ?>" >Xem chi tiết</a></td>
					<td><a href="sua_sp.php?idsp=<?php echo $row['idsp']?>"><img src="img/edit.png" width='20px'></a></td>
					<td><a href="xoa_sp.php?idsp=<?php echo $row['idsp'] ?>" ><img src="img/delete.png" width='20px'</a></td>
				</tr>
					<?php } ?>
				<tr>
					<td colspan = "6" align="center"><a href="buoi3_dangxuat.php"><h2>Đăng Xuất</h2><a></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php } ?>