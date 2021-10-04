 
<h3>Xin chào <?php echo $_SESSION['khach']?></h3>

        <form>
        <div class="col-sm-3"> 
        <div class="panel panel-default" style="background-color: #FDE2CA;">
        <div class="panel-body">
          <a href="index.php?xem=main" class="btn btn-info" name="ttin">
            <i class="glyphicon glyphicon-user"></i>  Thông tin tài khoản của bạn 
          </a>
          <p style="clear: both;"></p>
           <a href="index.php?xem=dhan" class="btn btn-info" name="dhan">
          <span class="glyphicon glyphicon-list-alt"></span> Đơn hàng
        </a>
        </div>
        </div>
        </div>
      </form>

      <?php
    $mysqll = "select*from khachhang where idkh = '".$_SESSION['idkh']."'";
    $myquery = mysqli_query($conn, $mysqll);
    $row = mysqli_fetch_array($myquery);
    $idkh = $row['idkh'];
     $tenkh = $row['tenkh'];
     $sdt = $row['dienthoai'];
     $email = $row['email'];
     $diachi = $row['diachikh'];
      ?>
 <div class="col-sm-9" align="center"> 
          <div class="panel panel-default"  style="background-color: #FDE2CA;">
          <div class="panel-body">
            Thông Tin Tài Khoản Của Tôi
          </div>
          <div class="panel-footer">
            <form class="form-horizontal" action="#" method="post">
            <div class="form-group" align="left">
           <div class="panel-body">
             <button type="submit" class="btn btn-default" name="hoso" >Hồ Sơ</button>
             <button type="submit" class="btn btn-default" name="dmk">Đổi mật khẩu</button>
          </div>
          </div>
          <?php
          if (isset($_POST['dmk'])) {
          ?>
          <div class="form-group">
            <label class="control-label col-sm-2">Mật Khẩu Cũ:</label>
            <div class="col-sm-8">
              <input type="pass" class="form-control" name="pass" placeholder="Mật khẩu cũ" width="20px">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Mật Khẩu mới:</label>
            <div class="col-sm-8">
              <input type="pass" class="form-control" name="newpass" placeholder="Mật Khẩu Mới" width="20px">
            </div>
          </div>
           <div class="form-group">
            <label class="control-label col-sm-2">Nhập Lại Mật Khẩu mới:</label>
            <div class="col-sm-8">
              <input type="pass" class="form-control" name="newpass1" placeholder="Nhập Lại Mật Khẩu mới" width="20px">
            </div>
          </div>
           <button type="submit" class="btn btn-default" name="luu" >Lưu</button>

        </form>

        </div>
      </div>
    </div>
         <?php }else{ ?>
          <div class="form-group">
            <label class="control-label col-sm-2">Tên khách hàng:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="tenkh" placeholder="ten khach hang" width="20px" value="<?php echo $tenkh; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Số điện thoại:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="sdtkh" placeholder="so dien thoai" width="20px" value="<?php echo $sdt; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Email:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="email" placeholder="Username" width="20px" value="<?php echo $email; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Địa chỉ:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="diachi" placeholder="Username" width="20px" value="<?php echo $diachi; ?>">
            </div>
          </div>
           <button type="submit" class="btn btn-default" name="cn" >Cập Nhật</button>
           <?php
           if (isset($_POST['cn'])) {
             $tenkhh=$_POST['tenkh'];
             $dienthoai=$_POST['sdtkh'];
             $emailkh = $_POST['email'];
             $diachikh = $_POST['diachi'];
             $cn="UPDATE khachhang set tenkh='$tenkhh', dienthoai = '$dienthoai', email = '$emailkh', diachikh = '$diachikh' where idkh='$idkh'";
             mysqli_query($conn,$cn);
              ?>
              <script type="text/javascript">
                alert("Cập nhật thành công");
                window.location = "index.php?xem=main";
              </script>
            <?php
           }
           ?>
        </form>

        </div>
      </div>
    </div>
    <?php 
    }

     ?>



 <?php
             if(isset($_POST['luu'])){
              if($_POST['pass'] == null){
                  ?>
                  <script type="text/javascript">
                  alert("Bạn Chưa Nhập Mật Khẩu Cũ");
                  window.location="index.php?xem=main";
                  </script>
                <?php
                }elseif ($_POST['pass']!= $row['pass']) {
                   ?>
                  <script type="text/javascript">
                  alert("Bạn Nhập Sai Mật Khẩu Cũ");
                  window.location="index.php?xem=main";
                  </script>
                <?php
              }elseif ($_POST['newpass']==null) {
                ?>
                  <script type="text/javascript">
                  alert("Bạn Chưa Nhập mật Khẩu mới.")
                  window.location="index.php?xem=main";
                  </script>
                <?php
              }elseif ($_POST['newpass1']==null) {
                ?>
                  <script type="text/javascript">
                  alert("Bạn Chưa Nhập Lại mật Khẩu mới.")
                  window.location="index.php?xem=main";
                  </script>
                <?php
              }elseif ($_POST['newpass']!=$_POST['newpass1']) {
                ?>
                  <script type="text/javascript">
                  alert("Mật khẩu không khớp.")
                  window.location="index.php?xem=main";
                  </script>
                <?php
              }else{
                 $passnew=$_POST['newpass1'];
                $luu="UPDATE khachhang set pass='$passnew' where idkh='$idkh'";
                mysqli_query($conn,$luu);
                 ?>
                  <script type="text/javascript">
                  alert("Cập nhật mật khẩu thành công");
                  window.location="index.php?xem=main";
                  </script>
                <?php
              }
             }
           ?>


