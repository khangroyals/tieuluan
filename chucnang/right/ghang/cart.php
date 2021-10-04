<?php 
      @$id= $_POST['id'];
	  $sql = "select * from sanpham where idsp = '$id";
	  $query = mysqli_query($conn, $sql);
?>
<h1 align="center"> Giỏ Hàng </h1>	
 <div class="col-sm-12">
 	<div class="table-responsive img_cart" id="listCart">
 		<table class="table table-bordered table-hover" id="cartx">
 			<tr>
 				<th style="width: 5%;"class="text-center">STT</th>
 				<th style="width: 15%;"class="text-center">Hình ảnh</th>
 				<th style="width: 25%;"class="text-center">Tên sản phẩm</th>
 				<th style="width: 15%;"class="text-center">Đơn giá</th>
 				<th style="width: 10%;"class="text-center">Số lượng</th>
 				<th style="width: 15%;"class="text-center">Thành tiền</th>
 				<th style="width: 5%;"class="text-center">Xóa</th>
 			</tr>
 			<?php 
 				$total =0;
 				$STT = 1;
 				if(isset($_SESSION['cart'])) {
 					foreach ($_SESSION['cart'] as $key => $value) {
 			?>
 			<tr align="center">
 				<td><?php echo $STT ?></td>
 				<td><img style="height: 50px; width: 50px; margin-left: auto; margin-right: auto;" src="admin/module/sanpham/img/<?php echo $value['image']?>" class="img-responsive text-center"></td>
 				<td><?php echo $value['name'] ?></td>
 				<td class="text-danger"><?php echo number_format($value['price'])?><sup><u>đ</u></sup></td>
 				<td>
 					<input style="width: 60px;" type="number" id="quantity_<?php echo $key?>" name="quantity" value="<?php echo $value["num"]?>" min="1" onchange="updateCart(<?php echo $key ?>)">
 				</td>
 				<td class="text-danger"><?php echo number_format($value["price"]*$value["num"]); ?><sup><u>đ</u></sup></td>
 				<td><a href="" onclick="deleteCart(<?php echo $key ?>)"><i class="glyphicon glyphicon-trash"></i></a></td>
 			</tr>
 			<?php 
 				$STT++;
 				$total += $value["price"]*$value["num"];
 				} }else{
 					echo "Bạn chưa mua hàng!!!";
 				}
 			?>
 			<tr class="end">
 				<td colspan="7" align="center">Tổng Cộng: <strong><?php echo number_format($total); ?><sup>đ</sup></strong></td>
 			</tr>
 		</table>
 </div>
<?php
		if (isset($_SESSION['khach'])) {
			include('name.php');
			}else{
				 include('order.php');
			}
	?>
</div>












