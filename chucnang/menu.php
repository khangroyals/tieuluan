  <?php
    if (isset($_GET['ac'])&& $_GET['ac']=='logout') {
        unset($_SESSION['taikhoan']);
  ?>
          <script type="text/javascript">
          alert("Bạn đã đăng xuất tài khoản.");
          window.location="index.php";
          </script>
  <?php } ?>
  <div>
  <nav>
   <div class="container-fluid" style="background-color:#F5A89A;"><!-- #F5A89A -->
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"> 
         <i class="glyphicon glyphicon-home"></i>
      Trang chủ</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php?xem=gioithieu"><b class=" glyphicon glyphicon"></b>  Giới thiệu </a></li>
      <li><a href="index.php?xem=giohang"><span class=" glyphicon glyphicon-shopping-cart"></span>  Giỏ hàng </a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right" >
      <p style="float: right;" >
      <?php
        if(isset($_SESSION['taikhoan'])){
      ?>
        <a href="#" class="navbar-brand">
          <i class="glyphicon glyphicon-bell"></i> Thông báo
        </a>
        <a href="index.php?xem=main" class="navbar-brand">
          <i class="glyphicon glyphicon-user"></i> 
          <?php  echo $_SESSION['taikhoan'];?></a>
        <a class="navbar-brand" href="index.php?ac=logout">Đăng xuất</a>
        <?php
      }else{
        ?><a class="navbar-brand" href="index.php?xem=dn"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a>
          <a class="navbar-brand" href="index.php?xem=dk"><i class="fa fa-check" aria-hidden="true"></i> Đăng ký</a>
        <?php
      }
      ?>  
    </p>
      </ul>
    </div>
  </nav>
</div>



 <?php
  $con = mysqli_connect("localhost","root","","new");
  $sql = "SELECT user,pass FROM quantri";
  $query = mysqli_query($con, $sql);
  $dong = mysqli_fetch_array($query);
  //Đăng nhập cho admin
  if(isset($_POST['log'])){
      if($_POST['user'] == null){
        ?>
        <script type="text/javascript">
        alert("Bạn Chưa Nhập Tên Tài Khoản.");
        window.location="index.php?xem=dn";
        </script>
        <?php
        exit();
      }elseif ($_POST['user']!= $dong['user']) {
        ?>
        <script type="text/javascript">
        alert("Bạn Nhập Sai Tên Tài Khoản.");
        window.location="index.php?xem=dn";
        </script>
        <?php
      }else{
        $username=$_POST['user'];

      }
      if($_POST['password'] == null){
        ?>
        <script type="text/javascript">
        alert("Bạn Chưa Nhập mật khẩu Tài Khoản.");
        window.location="index.php?xem=dn";
        </script>
        <?php
        exit();
      }elseif ($_POST['password']!= $dong['pass']) {
        ?>
        <script type="text/javascript">
        alert("Bạn Nhập Sai Mật Khẩu Tài Khoản.");
        window.location="index.php?xem=dn";
        </script>
        <?php
      }else{
        $pass=MD5($_POST['password']);
      }
      if($username && $pass){
            $data=mysqli_fetch_assoc($query);
            $_SESSION['user'] = $data['user'];
            $_SESSION['pass']=$data['pass'];
            ?>
            <script type="text/javascript">
            alert("Đăng nhập thành công!");
              window.location = "http://localhost/new/admin/tc.php";
            </script>
            <?php
            exit();
          
        }
      $dis=$con->close();
}

  //Đăng nhập cho khách hàng
  if(isset($_POST['khach'])) {
    $taikhoan = $_POST["user"];
    $matkhau = $_POST['password'];
    if($taikhoan=='' || $matkhau ==''){
      ?>
        <script type="text/javascript">
        alert("Vui lòng nhập đầy đủ thông tin.");
        window.location="index.php?xem=dn";
        </script>
        <?php
    }else{
      $sql_select_admin = mysqli_query($con,"SELECT * FROM user WHERE taikhoan ='$taikhoan' AND matkhau ='$matkhau' LIMIT 1");
      $count = mysqli_num_rows($sql_select_admin);
      $row_dangnhap = mysqli_fetch_array($sql_select_admin);
      if($count>0){
        $_SESSION['taikhoan'] = $row_dangnhap['taikhoan'];
        $_SESSION['hoten'] = $row_dangnhap['hoten'];
         ?>
        <script type="text/javascript">
        alert("Đăng nhập thành công!");
        window.location="index.php";
        </script>
    <?php
      }else{
    ?>
        <script type="text/javascript">
        alert("Bạn nhập sai tên đăng nhập hoặc mật khẩu ");
        window.location="index.php?xem=dn";
        </script>
        <?php
      }
    }
 }
 ?>

  <!-- Đăng ký -->
<?php 
  $conn = mysqli_connect("localhost","root","","new");
  if(isset($_POST['dangki'])){
    $hoten = $_POST['hoten'];
    /* echo $hoten;
    die(); */
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];
    $xacnhan = $_POST['xacnhan'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $dienthoai = $_POST['dienthoai'];
    

    //kiểm tra tên tài khoản có tồn tại hay chưa
    $sql = mysqli_query($conn,"SELECT * FROM user WHERE taikhoan ='$taikhoan'");
    $result=mysqli_num_rows($sql);
    if($result>0){
      echo '<script type="text/javascript">
              alert("Tên tài khoản đã tồn tại");
            </script>';
    }
    //xác nhận mật khẩu
    else if($matkhau !== $xacnhan){
      echo '<script type="text/javascript">
              alert("Xác nhận mật khẩu không đúng");
            </script>';
    }
    //Thêm mới
    else{
      $add_user = "INSERT INTO user (hoten, taikhoan, matkhau, email, diachi, dienthoai) 
            VALUES('$hoten','$taikhoan','$matkhau','$email','$diachi','$dienthoai')";

      mysqli_query($conn,$add_user);
      echo '<script type="text/javascript">
          alert("Đăng ký thành công! Vui lòng đăng nhập lại ");
          window.location="index.php?xem=dn";
          </script>';
    }
  }
    
?>

 <p style="clear: both;"></p>