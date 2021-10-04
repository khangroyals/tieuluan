<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  	<style>
    .row.content {height: 1200px;}
    
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 0px;
      }
      .row.content {height: auto;} 
    }
   .container{
	width: 370px;
	height: 310px;
	background: #EE7C6B;
	margin: auto;
	/*margin-top: 100px;*/
	border-radius: 20px;
	}

	label{
		font-size: 40px;
		margin-left: 97px;
		font-family: time new roman;
		color: #FCDAD5;
	}
	input{
		padding-left: 15px;
		padding-right: 15px;
		font-size: 24px;
		border-radius: 7px;
		padding-top: 5px;
		padding-bottom: 5px;
		margin-left: 15px;
		margin-top: 20px;
		margin-bottom: 5px;
	}
	.btn {
		background: #EE7C6B;
		width: 330px;
		height: 40px;
		margin-left: 17px;
		margin-top: 15px;
		border-radius: 10px;
		font-family: time new roman;
		font-size: 21px;
		color: #FCDAD5;
		cursor: pointer;
	}
	.a{
		padding: 100px;
	}
	/*a{
		text-decoration: none;
		font-size: 20px;
		color: white;
		margin-left: 200px;
	}*/
  </style>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<?Php
	$con = mysqli_connect("localhost","root","","new");
	$sql = "SELECT user,pass FROM quantri";
	$query = mysqli_query($con, $sql);
	$dong = mysqli_fetch_array($query);
	if(isset($_POST['log'])){
	if($_POST['user'] == null){
		?>
		<script type="text/javascript">
		alert("Bạn Chưa Nhập Tên Tài Khoản.");
		window.location="index.php";
		</script>
		<?php
		exit();
	}elseif ($_POST['user']!= $dong['user']) {
		?>
		<script type="text/javascript">
		alert("Bạn Nhập Sai Tên Tài Khoản.");
		window.location="index.php";
		</script>
		<?php
	}else{
		$username=$_POST['user'];

	}
	if($_POST['password'] == null){
		?>
		<script type="text/javascript">
		alert("Bạn Chưa Nhập mật khẩu Tài Khoản.");
		window.location="index.php";
		</script>
		<?php
		exit();
	}elseif ($_POST['password']!= $dong['pass']) {
		?>
		<script type="text/javascript">
		alert("Bạn Nhập Sai Mật Khẩu Tài Khoản.");
		window.location="index.php";
		</script>
		<?php
	}else{
		$pass=$_POST['password'];
	}
	if($username && $pass){
		
		//require("../includes/config.php");
		

		$sql = "SELECT user,pass FROM dangnhap";
		$results = mysqli_query($con,$sql);
		if($result->num_rows > 0) {
				?>
				<script type="text/javascript">
					alert("Tên Truy cập Hoặc Mật Khẩu chưa chính Xác.Vui Lòng Nhập Lại!");
					window.location = "index.php";
				</script>
				<?php
				exit();
			} else {
				$data=mysqli_fetch_assoc($results);
				$_SESSION['user'] = $data['user'];
				$_SESSION['pass']=$data['pass'];
				
				header("location:tc.php?trchu=trangchu");
				exit();
			}
		}
	$dis=$con->close();
}
	?>
	
</head>
<body>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="http://hoabinhduong.com/upload/hinhanh/9358354100422270-6277.jpg" alt="Los Angeles" style="width:100%; height: 250px;">
          </div>

          <div class="item">
            <img src="https://shophoavn.com/assets/upload/gallery/banner1-jpg.jpg" alt="Chicago" style="width:100%; height: 250px;">
          </div>

          <div class="item">
            <img src="http://yesflower.vintech.vn/hinh-anh/quang-cao/1509801001.jpg" alt="New york" style="width:100%; height: 250px;S">
          </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
	<form class="a" action="index.php" method="post">
		<div class="container">
			<label for="">Đăng Nhập</label>
			<input type="text" name="user" placeholder="Username" value="">
			<input type="password" name="password" placeholder="Password" value="">
			<a href="#">Forgot Password</a>
			<button type="submit" class="btn" name="log">Login</button>
		</div>
	</form>
</body>
