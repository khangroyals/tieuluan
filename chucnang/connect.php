<?php 
session_start();
$conn = mysqli_connect("localhost","root","","new");
  mysqli_set_charset($conn, 'UTF8');

if (mysqli_connect_errno())
{
	echo "kết nối bị lỗi: " . mysqli_connect_error();
}

	mysqli_set_charset($conn, "utf8");

	

?>