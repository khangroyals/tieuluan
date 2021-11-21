<div class="container-fluid">
	<div class="row content">
		<div class="col-sm-12 sidenav">
			<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "new";
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			$sql = "select * from chitietdathangdn";
			$run = mysqli_query($conn, $sql);
			?>

			<h4 align="center">Thông tin đặt hàng</h4>
			<table width="90%" border="1" align="center">
				<tr>
					<td>STT</td>
					<td>Id đặt hàng</td>
					<td>Họ và tên</td>
					<td>Id sản phẩm</td>
					<td>Tên sản phẩm</td>
					<td>Tổng tiền</td>
					<td>Số lượng sản phẩm</td>
					<td>Ngày đặt hàng</td>
					<td>Hình ảnh</td>
					<td colspan="2" align="center">Quản lý</td>
					<td>Trạng thái</td>
				</tr>
				<?php
				$i = 1;
				while ($dong = mysqli_fetch_array($run)) {
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $dong['iddhdn']; ?></td>
						<td><?php echo $dong['tenkh']; ?></td>
						<td><?php echo $dong['idsp']; ?></td>
						<td><?php echo $dong['tensp']; ?></td>
						<td><?php echo $dong['tongtien']; ?></td>
						<td><?php echo $dong['soluongsp']; ?></td>
						<td><?php echo $dong['ngaydathang']; ?></td>
						<td><img src="module/sanpham/img/<?php echo $dong['hinhanh'] ?>" width="60" height="60"></td>
						<td><a href="module/donhangdn/update.php?id=<?php echo $dong['iddhdn'] ?>">Duyệt đơn hàng</a></td>
						<td><a href="module/donhangdn/xoa.php?id=<?php echo $dong['iddhdn'] ?>">xóa đơn hàng</a></td>
						<td><?php echo $dong['trangthai'] ?></td>
					</tr>
				<?php
					$i++;
				}
				?>
			</table>
		</div>
	</div>
</div>