<?php
	  session_start();

	if (isset($_POST['id']) && isset($_POST['num'])) {
		echo $_POST['id'];
		$servername = "localhost";
	    $username = "root";
	    $password = "";
	    $dbname = "new";
	    $conn = mysqli_connect($servername, $username, $password, $dbname);
		$id= $_POST['id'];
		$num= $_POST['num'];
		$sql = "select * from `sanpham` where `idsp` = $id";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		if (!isset($_SESSION['cart'])) {
			$cart = array();
			$cart[$id] =array(
				'name'=>$row['tensp'],
				'num'=>$num,
				'price'=>$row['gia'],
				'image'=>$row['hinhanh']
			);
		}else{
			$cart = $_SESSION['cart'];
			if(array_key_exists($id, $cart)){
				$cart[$id] =array(
				'name'=>$row['tensp'],
				'num'=>(int)$cart[$id]['num'] +$num,
				'price'=>$row['gia'],
				'image'=>$row['hinhanh']
			);	
			}else{
				$cart[$id] =array(
				'name'=>$row['tensp'],
				'num'=>$num,
				'price'=>$row['gia'],
				'image'=>$row['hinhanh'] 
			);
			}
		}
		$_SESSION["cart"] = $cart;
		// $numberCart = 0;
		// foreach ($cart as $key => $value) {
		// 	$numberCart ++;
		// }
		// echo $numberCart;
	}
?>

