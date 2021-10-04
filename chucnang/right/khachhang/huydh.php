
<?php
	function show_array($data){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "new";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
		$id = $_GET['id'];
		$sql="UPDATE chitietdathangdn set trangthai='Đã hủy' where iddhdn='$id'";
		mysqli_query($conn, $sql);
		?>
		<script type="text/javascript">
	 	alert("Hủy đơn hàng thành công");
	 	window.location="../../../index.php?xem=dhan";
	 	</script>