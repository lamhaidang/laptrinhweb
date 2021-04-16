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
	
	$sql1 = "SELECT tensp FROM sanpham where idtv = '$d'";
	$result1 = $con->query($sql1);
	
	$sql2 = "SELECT hinhanhsp FROM sanpham where idtv = '$d'";
	$result2 = $con->query($sql2);
	$sql3 = "SELECT hinhanhsp FROM sanpham where idtv = '$d'";
	$result3 = $con->query($sql3);
}	
	
?>

<!DOCTYPE html>

<html>
<head> 
	<title> Lập trình web (CT428) </title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />

</head>	
<body>
<div id="wrap">
	<div id="title">
		<h1>Bài 2 - Buổi 4</h1>
	</div> <!--end div title-->
	<div id="menu">
		<!-- chèn menu của sinh viên vào-->
	</div> <!--end div menu-->
	<div id="content">
		<!--Nội dung trang web-->
		<h1>Slide show</h1>
	
		<form>
			<img id="laptopImg" src="<?php $row = $result3->fetch_assoc();            echo "img/" . $row['hinhanhsp'] ?>" height="300" width="300" />
			<br/>
			<input type="button" name="previous" value="Previous" onclick="changeSlide(-1)">
			<input type="button" name="next" value="Next" onclick="changeSlide(1)">
			<br/>
			<select id="laptopSel" onchange="chooseSlide(value)">
				<?php
					$t =0;
					while ($row = $result1->fetch_assoc() ){
						echo " <option value='".$t."'>".$row['tensp']."</option>";
						$t++;
					}
				?>
			</select> 
		</form>
		<p>Yêu cầu:<br/>
		Có 4 hình ảnh về máy tính đính kèm, mặc định hiển thị hình máy HP.<br/>
			<ul>
				<li>Khi người dùng nhấn Next thì hiển thị hình tiếp theo (theo thứ tự Hp -> Dell -> Acer -> Asus).</li>
				<li>Khi người dùng nhấp Previous thì hiển thị hình trước đó.</li>
				<li>Cả nút Next và Previous đều hiển thị vòng tròn (nếu đang xem hình HP mà nhấn Previous thì sẽ chuyển sang hình Asus).</li>
				<li>Người dùng có thể chọn xem một hình nào đó từ danh sách bên dưới nút Previous và Next.</li>
				<li>Khi người dùng thay đổi hình bằng cách nhấn Previous hoặc Next thì tên hiển thị bên dưới cũng thay đổi theo.</li>
			</ul>	
		</p>
	</div> <!--end div content-->
	<div id="footer">
		<p>Họ tên SV: <br/> Email: </p>
	</div> <!--end div footer-->
</div> <!--end div wrap-->
<script>
	var IMGGE = [];
	var so = 0,m;
<?php
		$i =0;
		while ($row = $result2->fetch_assoc() ){
			echo "IMGGE[".$i."] = 'img/" . $row['hinhanhsp']."      ';";
			$i++;
		}
		
		echo "m = " . ($i-1);
?>
	
	function changeSlide(n){
		
		so = so +n;
		if(so < 0) so = m;
		if(so > m) so = 0;
		var theImg = document.getElementById("laptopImg");
		theImg.setAttribute("src",IMGGE[so]);
		document.getElementById("laptopSel").selectedIndex = so;
		
}
	function chooseSlide(n){
		var theImg = document.getElementById("laptopImg");
		theImg.setAttribute("src",IMGGE[n]);
}
</script>

</body>
</html>