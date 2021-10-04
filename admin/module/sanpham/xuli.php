
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
	$tensp =$_POST['tensp'];
	$khoiluong = $_POST['khoiluong'];
	$tuoivang = $_POST['tuoivang'];
	$loaisp = $_POST['loaisp'];
	$hinhanhh = $_FILES['hinhanh']['name'];
	$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
	move_uploaded_file($hinhanh_tmp, 'img/'.$hinhanhh);
	$giadexuat = $_POST['giadexuat'];
	$noidung = $_POST['mota'];
	$chungloaisp = $_POST['chungloaisp'];
	$id = $_GET['id'];

	
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}	
	if(isset($_POST['them'])){
		$sql="INSERT INTO sanpham (tensp, idloaisp, hinhanh, gia, noidung, khoiluong, tuoivang, chungloai) VALUES ('$tensp', '$loaisp', '".$hinhanhh."', '$giadexuat', '$noidung', '$khoiluong', '$tuoivang', '$chungloaisp')";
		mysqli_query($conn, $sql);
		show_array($_POST);
		header('Location:../../tc.php?sanpham=quanlisanpham&ac=them&mess=tc');
	
	}elseif(isset($_POST['sua'])){
		if($hinhanhh!=''){
		$sql="UPDATE sanpham set tensp='$tensp', idloaisp='$loaisp', hinhanh='$hinhanhh', gia='$giadexuat', noidung='$noidung' khoiluong='$khoiluong', tuoivang='$tuoivang'chungloai='$chungloaisp'  where idsp='$id'";
		}else{
			$sql="UPDATE sanpham set tensp='$tensp', idloaisp='$loaisp', gia='$giadexuat', noidung='$noidung', khoiluong='$khoiluong', tuoivang='$tuoivang', chungloai='$chungloaisp' where idsp='$id'";
		}
		mysqli_query($conn,$sql);
		header('Location:../../tc.php?sanpham=quanlisanpham&ac=them&mess=tc');
	}else{
		$sql="delete from sanpham where idsp ='$id'";
		mysqli_query($conn,$sql);
		header('Location:../../tc.php?sanpham=quanlisanpham&ac=them&mess=tc');
	}

?> 