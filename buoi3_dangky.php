<html>
	<head>
		<title> Form Đăng Ký </title>
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
		<h1>Đăng Ký Tài Khoản Mới</h1>
		<h2> Lâm Hãi Đăng B1706460</h2>
		<p>Vui lòng điền đầy đủ thông tin để đăng ký tài khoản mới</p>
		<form action="Buoi3_xuly_DangKy.php" method="post" enctype="multipart/form-data">
		  <table>
			<tr>
				<td>Tên Đăng Nhập </td>
				<td></td>
				<td><input type="text" name="ten"></td>
			</tr>
			<tr>
				<td>Mật Khẩu </td>
				<td></td>
				<td><input type="password" name="password1"></td>
			</tr>
			<tr>
				<td>Gõ Lại Mật Khẩu </td>
				<td></td>
				<td><input type="password" name="password2"></td>
			</tr>
			<tr>
				<td>Hình đại diện </td>
				<td></td>
				<td><input type="file" name="hinhanh" accept="image/*" /></td>
			</tr>
			<tr>
				<td>Giới Tính</td>
				<td></td>
				<td><input type="radio" name="gender" value="Nam" checked>
				Nam
				<input type="radio" name="gender" value="Nữ" checked>
				Nữ
				<input type="radio" name="gender" value="Khác" checked>
				Khác</td>
			</tr>
			<tr>
				<td>Nghề Nghiệp</td>
				<td></td>
				<td><select name="dropdown">
				<option value="Hoc Sinh" selected>Hoc Sinh</option>
				<option value="Sinh Viên">Sinh Viên</option>
				<option value="Giáo Viên">Giáo Viên</option>
				<option value="khác">Khác</option></td>
				</select>
			</tr>
			<tr>
				<td>Sở thích</td>
				<td></td>
				<td><input type="checkbox" name="sothich[]" value="Thể Thao" >Thể Thao
					<input type="checkbox" name="sothich[]" value="Du Lịch" > Du Lịch
					<input type="checkbox" name="sothich[]" value="Âm Nhạc" > Âm Nhạc<br>
					<input type="checkbox" name="sothich[]" value="Thời Trang"> Thời Trang</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value ="Đăng ký"></td>
				<td><input type="reset" name="reset" value ="Làm lại"></td>
			</tr>
			</table>
		</form>
	</body>
</html>