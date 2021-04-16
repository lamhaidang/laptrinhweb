
<?php
session_start();
if(isset($_SESSION['tendangnhap'])){
		$tenten = $_SESSION['tendangnhap'];
//("localhost","id12854302_dang","Dang3838404@","id12854302_buoi3");
	$con = new mysqli("localhost","root","","buoi3");
	$con->set_charset("utf8");
	$sql0 = "SELECT id FROM thanhvien where tendangnhap ='$tenten'";
	$bien = $con->query($sql0);
	$row = $bien->fetch_assoc();
	$d = $row['id'];
	
	$sql1 = "SELECT * FROM sanpham where idtv = '$d'";
	$result = $con->query($sql1);
	
	
?>




<html>
	<head>
		<title>Buổi 5 Bài 3</title>
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
		<script>
			function ham(str){
				var xmlhttp, ok;
				if(window.XMLHttpRequest){
					xmlhttp = new XMLHttpRequest();
				} else{
					xmlhttp=new ActiveXObject("Micrsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function(){
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById("id").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","buoi5_bai3_xl.php?t="+str,true);
				xmlhttp.send();

			}
			
			
			function roira(){
					document.getElementById("id").innerHTML = "";
			}
		</script>
		
		
		
		
		
		
		
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
					<td><p onmouseover="ham(<?php echo $row['idsp'] ?>)" onmouseout="roira()"><?php echo $i++; ?> </p></td>
					<td><p onmouseover="ham(<?php echo $row['idsp'] ?>)"  onmouseout="roira()"><?php echo $row['tensp']?></p></td>
					<td><p onmouseover="ham(<?php echo $row['idsp'] ?>)"  onmouseout="roira()"><?php echo $row['giasp']?></p></td>
					<td><p onmouseover="ham(<?php echo $row['idsp'] ?>)"  onmouseout="roira()">Xem chi tiết</p></td>
					<td><p onmouseover="ham(<?php echo $row['idsp'] ?>)"  onmouseout="roira()"><a href="sua_sp.php?idsp=<?php echo $row['idsp']?>"><img src="img/edit.png" width='20px'></a></p></td>
					<td><p onmouseover="ham(<?php echo $row['idsp'] ?>)"  onmouseout="roira()"><a href="xoa_sp.php?idsp=<?php echo $row['idsp'] ?>" ><img src="img/delete.png" width='20px'</a></p></td>
				</tr>
					<?php } ?>
				<tr>
					<td colspan = "6" align="center"><a href="buoi3_dangxuat.php"><h2>Đăng Xuất</h2><a></td>
				</tr>
			</table>
		</form>
		<div id = "id"></div>
	</body>
</html>
<?php } ?>