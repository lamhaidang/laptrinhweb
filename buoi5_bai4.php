

<?php
session_start();
if(isset($_SESSION['tendangnhap'])){
    $con = new mysqli("localhost","root","","buoi3");
	$con->set_charset("utf8");
		$tenten = $_SESSION['tendangnhap'];
	$sql1 = "SELECT id FROM thanhvien where tendangnhap = '$tenten'";
	$result1 = $con->query($sql1);
	$idtv = $result1->fetch_assoc()['id'];
//("localhost","id12854302_dang","Dang3838404@","id12854302_buoi3");
	
	$sql = "SELECT * FROM sanpham where idtv='$idtv'";
	$result = $con->query($sql);
	
?>
<script>
	function ham(n){
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
				xmlhttp.open("GET","buoi5_bai4_xl.php?t="+ n,true);
				xmlhttp.send();

			}
</script>




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
		<form  action="" method="post" enctype="multipart/form-data">
		<p style="text-align : center" width ="40%"><input onkeyup = "ham(this.value)"type="text" name="tim" placeholder="tìm kiếm sản phẩm"></p>
		<p id="id"></p>
			<table style="position : relative; left: 35%" border = 1>
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