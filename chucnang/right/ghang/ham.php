<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$table='orders';
function addNew($table, $data)
{
	global $conn;
	$filed = "id_order,hoten,email,dienthoai,diachi,tongtien,ngayorders";
	$value = "";
	if (is_array($data)) {
		$i = 0;
		foreach ($data as $key => $val) {
			if ($key != "dathang"){
				$i++;
				if ($i == 1) {
					$filed .= $key;
					$value .= "'" . $val . "'";
				} else {
					$filed .= "," . $key;
					$value .= ",'" . $val . "'";
				}
			}
		}
		$sqlInser = "INSERT INTO orders ('$filed') VALUES ('$value')";
		mysqli_query($conn, $sqlInser);
		$id_order = mysqli_insert_id($conn);
		return $id_order;
	}
}
?>