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
	@$id = $_GET['id'];	
	$sql="select *from loaisp where idloaisp = '$id'";
	$query = mysqli_query($conn, $sql);
	$row=mysqli_fetch_array($query);
?>

<form action="module/loaisp/xuli.php?id=<?php echo $row['idloaisp']?>" method="post" enctype="multipart/form-data">
<table width="50%" align="left" padding="5px">
	<tr>
		<td colspan="2"><div align="center">Sửa loại sản phẩm</div></td>
	</tr>
	<tr>
		<td>Tên loại sản phẩm</td>
		<td><input type="text" name="tenloaisp" value="<?php echo $row['tenloaisp']?>"></td>
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

$sql="select *from loaisp order by idloaisp desc";
$run = mysqli_query($conn,$sql);
?>

 <table width="50%" border="1" align="right">
	<tr>
		<td>STT</td>
		<td>ID loại sản phẩm</td>
		<td>Tên loại sản phẩm</td>
		<td colspan="2" align="center">Quản lý</td>
	</tr>
	<?php
		$i=1;
		while($dong= mysqli_fetch_array($run)) {		
	?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $dong['idloaisp']; ?></td>
		<td><?php echo $dong['tenloaisp']; ?></td>
		<td><a href="tc.php?loaisp=quanliloaisanpham&ac=sua&id=<?php echo $dong['idloaisp'] ?>"> Sửa </a></td>
		<td><a href="module/loaisp/xuli.php?id=<?php echo $dong['idloaisp']?>"> Xóa </a></td>
	</tr>
	<?php
		$i++;
		}
	?>
</table>

