
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
		$sql="delete from chitietdathangdn where iddhdn='$id'";
		mysqli_query($conn, $sql);
		show_array($_POST);
		?>
		<script type="text/javascript">
	 	alert("Xóa đơn hàng thành công");
	 	window.location="../../tc.php?dathang=quanlidathangdn";
	 	</script>
		