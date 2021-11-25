<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new";
$conn = mysqli_connect($servername, $username, $password, $dbname);
function addNew($table, $data)
{
	global $conn;
	$filed = "";
	$value = "";
	if (is_array($data)) {
		$i = 0;
		foreach ($data as $key => $val) {
			if ($key != "dathang") {
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
		$sqlInser = "INSERT INTO $table ($filed)";
		$sqlInser .= "VALUES ($value)";
		mysqli_query($conn, $sqlInser) or die("Lỗi câu truy vấn");
		$id_order = mysqli_insert_id($conn);
		return $id_order;
	}
}
?>