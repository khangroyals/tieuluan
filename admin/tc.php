<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shop hoa tươi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 0px;
      }
      .row.content {height: auto;} 
    }
    body{
      height: 1200px;
    }
    .nav_navbar-nav{
      font-size:14px; 
    }

    td {
      padding:10px;}
  </style>
</head>
<body>
  <div>
    <?php
      include ('module/config.php');
      include('module/header.php');
      include('module/menu.php');
      include('module/content.php');
      
    ?>
  </div>

</body>
</html>
