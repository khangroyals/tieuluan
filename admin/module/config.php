<?php
  $servername = "localhost";
  $database = "new";
  $username = "root";
  $password = "";
  $conn = mysqli_connect($servername, $username, $password, $database);
  mysqli_select_db($conn, $database);
  mysqli_set_charset($conn, 'UTF8');
?> 