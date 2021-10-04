
<?php
	function show_array($data){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
	// if(isset($_POST['them'])){
	// 	show_array($_POST);
	// }

	// ------
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "new";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$tenloaisp = $_POST['tenloaisp'];
	$id = (int)$_GET['id'];
	
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}	
	if(isset($_POST['them'])){
		$sql="INSERT INTO loaisp (idloaisp, tenloaisp) VALUES ('', '$tenloaisp')";
		mysqli_query($conn, $sql);
		show_array($_POST);
		header('Location:../../tc.php?loaisp=quanliloaisanpham&ac=them&mess=tc');
	
	}elseif(isset($_POST['sua'])){
		$sql="UPDATE loaisp set tenloaisp='$tenloaisp' where idloaisp='$id'";
		mysqli_query($conn, $sql);
		header('Location:../../tc.php?loaisp=quanliloaisanpham&ac=them&mess=tc');
	}else{
		$sql="delete from loaisp where idloaisp ='$id'";
		mysqli_query($conn,$sql);
		header('Location:../../tc.php?loaisp=quanliloaisanpham&ac=them&mess=tc');
	}


?>