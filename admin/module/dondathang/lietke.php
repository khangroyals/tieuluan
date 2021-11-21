<div class="container-fluid">
	<div class="row content">
		<div class="col-sm-12 sidenav">
			<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "new";
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			$sql = "select * from orders order by id_order desc";
			$run = mysqli_query($conn, $sql);

			?>

			<h4 align="center">Thông tin đặt hàng</h4>
			<table width="45%" border="1" align="left">
				<tr>
					<td>STT</td>
					<td>Id đặt hàng</td>
					<td>Họ và tên</td>
					<td>Email</td>
					<td>Số điện thoại</td>
					<td>Địa chỉ</td>
					<td>Tổng Tiền</td>
					<td>Ngày đặt hàng</td>
					<td>Xu Ly</td>
				</tr>
				<?php
				$i = 1;
				while ($dong = mysqli_fetch_array($run)) {
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $dong['id_order']; ?></td>
						<td><?php echo $dong['hoten']; ?></td>
						<td><?php echo $dong['email']; ?></td>
						<td><?php echo $dong['dienthoai']; ?></td>
						<td><?php echo $dong['diachi']; ?></td>
						<td><?php echo $dong['tongtien']; ?></td>
						<td><?php echo $dong['ngayorders']; ?></td>
						<td> <a href="?dathang=quanlidathang&id=<?php echo $dong['id_order'] ?>">Xem đơn hàng</a></td>
					</tr>
				<?php
					$i++;
				}
				?>
			</table>


			<?php
			if (isset($_GET['dathang']) == 'quanlidathang') {
				$id = $_GET['id'];
				$sql_chitiet = mysqli_query($conn, "SELECT * FROM orders, chitietdathang WHERE orders.id_order=chitietdathang.id_order AND orders.id_order ='$id'");
			?>
				<table width="45%" border="1" align="right">
					<tr>
						<td>STT</td>
						<td>Id chi tiết đặt hàng</td>
						<td>Id đặt hàng</td>
						<td>Id sản phẩm</td>
						<td>Giá bán</td>
						<td>Số lượng</td>
						<td>Ngày đặt hàng</td>
						<td colspan="2" align="center">Xử lí</td>
						<td>Trạng thái</td>
					</tr>
					<?php
					$i = 0;
					while ($dong = mysqli_fetch_array($sql_chitiet)) {
						$i++;
					?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $dong['id_ctorder']; ?></td>
							<td><?php echo $dong['id_order']; ?></td>
							<td><?php echo $dong['idsp']; ?></td>
							<td><?php echo $dong['gia']; ?></td>
							<td><?php echo $dong['soluong']; ?></td>
							<td><?php echo $dong['ngayorder']; ?></td>
							<td><a href="module/dondathang/update.php?id=<?php echo $dong['id_ctorder'] ?>">Duyệt đơn hàng</a></td>
							<td><a href="module/dondathang/xoa.php?id=<?php echo $dong['id_ctorder'] ?>">xóa đơn hàng</a></td>
							<td><?php echo $dong['trangthai'] ?></td>
						</tr>
					<?php
						$i++;
					}
					?>
				</table>
			<?php }
			?>

		</div>
	</div>
</div>