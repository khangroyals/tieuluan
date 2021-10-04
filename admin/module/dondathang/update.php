
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
		$sql="UPDATE chitietdathang set trangthai='Đang vận chuyển' where id_ctorder='$id'";
		mysqli_query($conn, $sql);
		?>
		<script type="text/javascript">
	 	alert("Duyệt");
	 	window.location="../../tc.php?dathang=quanlidathang";
	 	</script>
		