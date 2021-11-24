<div class="container-fluid">
	<div class="row content">
		<div class="col-sm-12 sidenav">
			<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "new";
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			$sql = "select * from user";
			$run = mysqli_query($conn, $sql);

			?>

			<h4 align="center">Thông tin khách hàng</h4>
			<table width="80%" border="1" align="center">
				<tr>
					<td>STT</td>
					<td>Họ và tên khách hàng</td>
					<td>Email</td>
					<td>Số điện thoại</td>
					<td>Địa chỉ</td>
				</tr>
				<?php
				$i = 1;
				while ($dong = mysqli_fetch_array($run)) {
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $dong['hoten']; ?></td>
						<td><?php echo $dong['email']; ?></td>
						<td><?php echo $dong['dienthoai']; ?></td>
						<td><?php echo $dong['diachi']; ?></td>
					</tr>
				<?php
					$i++;
				}
				?>
			</table>
		</div>
	</div>
</div>