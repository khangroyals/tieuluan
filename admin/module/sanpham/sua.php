<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "new";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	@$id = (int)$_GET['id'];
	$sql = "select * from sanpham where idsp='$id'";
	$run = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($run);
	?>

	<form action="module/sanpham/xuli.php?id=<?php echo $row['idsp'] ?>" method="post" enctype="multipart/form-data">
		<table width="50%" align="left" padding="5px">
			<tr>
				<td colspan="2">
					<div align="center">Sửa sản phẩm</div>
				</td>
			</tr>
			<tr>
				<td>Tên sản phẩm</td>
				<td><input type="text" name="tensp" value="<?php echo $row['tensp'] ?>"></td>
			</tr>
			<?php
			$sql_loaisp = "select * from loaisp";
			$run_loaisp = mysqli_query($conn, $sql_loaisp);

			?>
			<tr>
				<td>Loại sp</td>
				<td><Select name="loaisp">
						<?php
						while ($dong_loaisp = mysqli_fetch_array($run_loaisp)) {
							if ($dong['idloaisp'] == $dong_loaisp['idloaisp']) {
						?>
								<Option selected="selected" value="<?php echo $dong_loaisp['idloaisp'] ?>"><?php echo $dong_loaisp['tenloaisp'] ?></Option>
							<?php
							} else {
							?>
								<Option value="<?php echo $dong_loaisp['idloaisp'] ?>"><?php echo $dong_loaisp['tenloaisp'] ?></Option>
						<?php
							}
						}
						?>
					</select></td>
			</tr>
			<td>Hình ảnh</td>
			<td><input type="file" name="hinhanh"><img src="module/sanpham/img/<?php echo $row['hinhanh'] ?>" width="60" height="60" /></td>
			</tr>
			
			<tr>
				<td>Nội dung sản phẩm</td>
				<td><textarea name="mota" cols="29" rows="10"><?php echo $row['noidung'] ?></textarea></td>
			</tr>
			<tr>
				<td colspan="2">
					<div align="center">
						<input type="submit" name="sua" id="sua" value="Sửa">
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
			<td><a href="module/sanpham/xuli.php?id=<?php echo $dong['idsp'] ?>"> xóa </a></td>
		</tr>
	<?php
		$i++;
	}
	?>
</table>