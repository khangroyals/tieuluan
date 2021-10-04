<form class="form-horizontal" method="post" action="index.php?xem=muahang">
			<div class="text-center">
				<button type="submit" class="btn btn-button" name="addNew" style="background-color: #FDE2CA;"><a href="index.php?xem=giohang">Cập nhật giỏ hàng</a></button>
				<button type="submit" class="btn btn-button" name="muahang">Mua Hàng</button>
			</div>
		</form>
<?php   

 		$mysqll = "select*from khachhang where idkh = '".$_SESSION['idkh']."'";
		$myquery = mysqli_query($conn, $mysqll);
		$row = mysqli_fetch_array($myquery);
		 $idkh = $row['idkh'];
         $tenkh = $row['tenkh'];
     	if(isset($_POST["addNeww"]))  {
	  	$tongtien = 0;
	  	foreach ($_SESSION["cart"] as $key => $value) {
	  		$tongtien += (int)$value["num"]*(int)$value["price"];
	  	}
	  	$_POST["tongtien"] = $tongtien;
	  	$date = date(("Y-m-d H:i:s"));
	  	foreach ($_SESSION["cart"] as $key => $value) {
	  		$num = $value['num'];
	  		$name = $value['name'];
	  		$image = $value['image'];
	  		$sql="INSERT INTO chitietdathangdn (idkh, tenkh, idsp, tensp, tongtien, soluongsp, ngaydathangdn, hinhanh, trangthai) VALUES ('$idkh','$tenkh','$key','$name','$total','$num','$date','$image', 'Đang chờ duyệt')";
			mysqli_query($conn, $sql);
	  		
	  	}
	  	

	  	unset($_SESSION['cart']);
	  	?>
			<script type="text/javascript">
	 	alert("Đặt hàng thành công");
	 	window.location="index.php";
	 	</script>
	 	<?php
	   }	
	 

?> 