<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<?php

	$mess = isset($_GET['mess']);
	if ($mess == 'tc') {
		echo "thanh cong";
	}
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "new";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	?>

	<form action="module/sanpham/xuli.php" method="post" enctype="multipart/form-data">
		<table width="50%" align="left" padding="5px">
			<tr>
				<td colspan="2">
					<div align="center">Thêm sản phẩm</div>
				</td>
			</tr>
			<tr>
				<td>Tên sản phẩm</td>
				<td><input type="text" name="tensp"></td>
			</tr>
			<?php
			$sql = "select * from loaisp";
			$run = mysqli_query($conn, $sql);

			?>
			<tr>
				<td>Loại sp</td>
				<td><Select name="loaisp">
						<option>Chọn loại sản phẩm</option>
						<?php
						while ($dong = mysqli_fetch_array($run)) {
						?>
							<Option value="<?php echo $dong['idloaisp'] ?>"><?php echo $dong['tenloaisp'] ?></Option>
						<?php
						}
						?>
			<tr>
				<td>Hình ảnh</td>
				<td><input type="file" name="hinhanh"></td>
			</tr>
			<tr>
				<td>Giá bán</td>
				<td><input type="text" name="giadexuat"></td>
			</tr>
	
			<tr>
				<td>Nội dung sản phẩm</td>
				<td><textarea name="mota" cols="29" rows="10"></textarea></td>
			</tr>

			<tr>
				<td colspan="2">
					<div align="center">
						<input type="submit" name="them" id="them" value="Thêm">
					</div>
				</td>
			</tr>
		</table>
	</form>
</head>

<body>
</body>

</html>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new";
$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "select * from sanpham order by idsp desc";
$run = mysqli_query($conn, $sql);
?>

<table width="50%" border="1" align="right">
	<tr>
		<td>STT</td>
		<td>Tên sản phẩm</td>
		<td>Loại sản phẩm</td>
		<td>Hình ảnh</td>
		<td>Giá bán</td>
		<td>Nội dung sản phẩm</td>
		<td colspan="2" align="center">Quản lý</td>
	</tr>
	<?php
	$i = 1;
	while ($dong = mysqli_fetch_array($run)) {
	?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $dong['tensp']; ?></td>
			<td><?php echo $dong['idloaisp']; ?></td>
			<td><img src="module/sanpham/img/<?php echo $dong['hinhanh'] ?>" width="60" height="60"></td>
			<td><?php echo $dong['gia']; ?></td>
			<td><?php echo $dong['noidung']; ?></td>
			<td><a href="tc.php?sanpham=quanlisanpham&ac=sua&id=<?php echo $dong['idsp'] ?>">Sửa</a></td>
			<td><a href="module/sanpham/xuli.php?id=<?php echo $dong['idsp'] ?>"> Xóa </a></td>
		</tr>
	<?php
		$i++;
	}
	?>
</table>