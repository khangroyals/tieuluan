 
<?php
	  $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "new";
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      $note= $_POST['note'];
     	if(isset($_POST["dathang"]))  {
     		if (isset($_SESSION['khach'])) {
     			$mysqll = "select*from khachhang where idkh = '".$_SESSION['idkh']."'";
				$myquery = mysqli_query($conn, $mysqll);
				$row = mysqli_fetch_array($myquery);
				$idkh = $row['idkh'];
		        $tenkh = $row['tenkh'];
     			$tongtien = 0;
	  			foreach ($_SESSION["cart"] as $key => $value) {
	  			$tongtien += (int)$value["num"]*(int)$value["price"];
	  			$tongtien >  5000000 ? $phivc = 0 : $phivc =50000;
	  			$tongtientt = $tongtien + $phivc;
			  	}
			  	$_POST["tongtien"] = $tongtien;
			  	$date = date(("Y-m-d H:i:s"));
			  	foreach ($_SESSION["cart"] as $key => $value) {
		  		$num = $value['num'];
		  		$name = $value['name'];
		  		$image = $value['image'];
		  		$sql="INSERT INTO chitietdathangdn (idkh, tenkh, idsp, tensp, tongtien, soluongsp, ngaydathangdn, hinhanh, trangthai) VALUES ('$idkh','$tenkh','$key','$name','$tongtientt','$num','$date','$image', 'Đang chờ duyệt')";
				mysqli_query($conn, $sql);
     		 }
     		unset($_SESSION['cart']);
     	}else{
			  	$_POST['hoten'] = $_SESSION['hoten'];
			  	$_POST['dienthoai'] = $_SESSION['dienthoai'];
			  	$_POST['email'] = $_SESSION['email'];
			  	$_POST['diachi'] = $_SESSION['diachi'];
			  	$_POST['note'] = $note;
			  	$tongtien = 0;
			  	foreach ($_SESSION["cart"] as $key => $value) {
			  		$tongtien += (int)$value["num"]*(int)$value["price"];
			  		$tongtien >  5000000 ? $phivc = 0 : $phivc =50000;
	  				$tongtientt = $tongtien + $phivc;
			  	}
			  	$_POST["tongtien"] = $tongtientt;
			  	$date = date(("Y-m-d H:i:s"));
			  	$_POST["ngayorders"] = $date;
			  	// $table = "orders";
			  	$id_order = addNew($table, $_POST);
			  	foreach ($_SESSION["cart"] as $key => $value) {
			  		$price = $value['price'];
			  		$num = $value['num'];
			  		$chitietdathang = "INSERT INTO chitietdathang (id_order, idsp, gia, soluong, ngayorder, trangthai)";
					$chitietdathang .= "VALUES ('$id_order', '$key','$price', '$num', '$date', 'Đang chờ duyệt')";
					mysqli_query($conn, $chitietdathang);
			  	}
	  	unset($_SESSION['cart']);
	  	?>
	 	<script type="text/javascript">
	 	alert("Đặt hàng thành công");
	 	window.location="index.php";
	 	</script>
	 	<?php
			  	}
			  }

?> 

 	