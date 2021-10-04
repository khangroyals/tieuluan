<form class="form-horizontal" method="post" action="index.php?xem=dathang">
	<?php
 			if (isset($_SESSION['khach'])) {
            $mysqll = "select*from khachhang where idkh = '".$_SESSION['idkh']."'";
			$myquery = mysqli_query($conn, $mysqll);
			$row = mysqli_fetch_array($myquery);
			 $idkh = $row['idkh'];
	         $tenkh = $row['tenkh'];
	         $dienthoaikh = $row['dienthoai'];
	         $diachikh = $row['diachikh'];
	         $emailkh = $row['email'];
	       	}else {
	       		$_SESSION['hoten'] = $_POST['hoten'];
	            $_SESSION['dienthoai'] = $_POST['dienthoai'];
	            $_SESSION['email'] = $_POST['email'];
	            $_SESSION['diachi'] = $_POST['diachi'];
		        if($_SESSION['hoten'] =="" || $_SESSION['dienthoai']=="" || $_SESSION['email']=="" || $_SESSION['diachi']==""){
	            ?>
			 	<script type="text/javascript">
			 	alert("Thiếu thông tin. Vui lòng nhập lại");
			 	window.location="index.php?xem=giohang";
			 	</script>
			 	<?php
	            
	        }
	       	}
           
            if ($_SESSION['cart']=="") {
            	?>
			 	<script type="text/javascript">
			 	alert("Vui lòng chọn sản phẩm cần mua");
			 	window.location="index.php?xem=giohang";
			 	</script>
		 	<?php
            }
 	?>
<p style="clear: both;"></p>
<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-body">
        	<div style="background-color: #FDE2CA; padding: 30px 0px 30px 0px; " >
        	<p><span class="glyphicon" style="color: red;">&#xe062;</span> Thông Tin Đặt Hàng</p>
        	<table  width="100%">
				<tr align="center">
				<td style="width: 20%">
					<?php if (isset($_SESSION['khach'])) {
						echo $tenkh. "<br />". $dienthoaikh;
					}else{ echo $_SESSION['hoten']. "<br />" .$_SESSION['dienthoai'];} ?>
				</td>
				<td style="width: 80%">
					<?php if (isset($_SESSION['khach'])) {
						echo $diachikh. "<br />". $emailkh;
					}else{  echo $_SESSION['diachi'];}?>
				</td>
				</tr>
			</table>
			</div>
			<p style="clear: both;"></p>
			<?php 
			      @$id= $_POST['id'];
				  $sql = "select * from sanpham where idsp = '$id";
				  $query = mysqli_query($conn, $sql);
			?>
			<div style="padding: 60px 0px 60px 0px; " >
			<table id="cartx" style="width: 100%">
			 			<tr>
			 				<th style="width: 8%;"class="text-center">Hình ảnh</th>
			 				<th style="width: 25%;"align="left">Tên sản phẩm</th>
			 				<th style="width: 25%;"class="text-center">Đơn giá</th>
			 				<th style="width: 25%;"class="text-center">Số lượng</th>
			 				<th style="width: 25%;"class="text-center">Thành tiền</th>
			 			</tr>
			 			<?php 
			 				$tongtien =0;
			 				if(isset($_SESSION['cart'])) {
			 					foreach ($_SESSION['cart'] as $key => $value) {
			 			?>
			 			<tr align="center">
			 				<td><img style="height: 50px; width: 50px; margin-left: auto; margin-right: auto;" src="admin/module/sanpham/img/<?php echo $value['image']?>" class="img-responsive text-center"></td>
			 				<td align="left"><?php echo $value['name'] ?></td>
			 				<td class="text-danger"><?php echo number_format($value['price'])?><sup><u>đ</u></sup></td>
			 				<td><?php echo $value['num']?></td>
			 				<td class="text-danger"><?php echo number_format($value["price"]*$value["num"]); ?><sup><u>đ</u></sup></td>
			 			</tr>
			 			<?php 
			 				$tongtien += $value["price"]*$value["num"];
			 				} }else{
			 				}
			 			?>
			 		</table>
			 	</div>
			 	<p style="clear: both;"></p>
			 	<div style="background-color: #FDE2CA; padding: 30px 0px 30px 0px; " >
		        	<table  width="100%">
						<tr align="center">
						<td style="width: 35%; padding-left: 10px;">
							<input type="text" class="form-control" placeholder="Lời nhắn..." width="8px" name="note" >
						</td>
						<td style="width: 65%">
							<?php $phivc = 0; ?>
							Phí Vận Chuyển : <?php $tongtien >  5000000 ? $phivc = 0 : $phivc =50000; echo $phivc."d";?>
						</td>
						</tr>
					</table>
			</div>
			<div style="padding: 30px 0px 30px 0px; " >
		        	<table  width="100%">
						<tr align="center">
							<td style="width: 35%; padding-left: 10px;"></td>
							<td style="width: 65%"> Tổng tiền hàng:  </td>
							<td align="center"><?php echo number_format($tongtien); ?></td>
						</tr>
						<tr align="center">
							<td style="width: 35%; padding-left: 10px;"></td>
							<td style="width: 65%">Phí Vận Chuyển : </td>
							<td align="center"><?php echo number_format($phivc); ?></td>
						</tr>
						<tr align="center">
							<td style="width: 35%; padding-left: 10px;"></td>
							<td style="width: 65%"> Tổng thanh toán: </td>
							<td align="center"><?php echo number_format($tongtien+$phivc); ?></td>
						</tr>

					</table>
			</div>
        </div>
      </div>
    </div>
<div style="background-color: #FDE2CA; padding: 30px 0px 30px 0px" align="center">
	<button type="submit" class="btn btn-button" name="dathang" >Đặt Hàng</button>
</div>


</form>