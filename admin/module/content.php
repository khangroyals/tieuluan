<div class="container-fluid">
  <div class="row content">
       <?php 
        if (isset($_GET['sanpham'])) {
          $tam=$_GET['sanpham'];
        }else{
          $tam ='';
        }
        if ($tam=='quanlisanpham') {
          include("module/sanpham/main.php");
        }
        if (isset($_GET['loaisp'])) {
          $tam=$_GET['loaisp'];
        }else{
          $tam ='';
        }if ($tam=='quanliloaisanpham') {
          include("module/loaisp/main.php");
        }

        if (isset($_GET['dathang'])) {
          $tam=$_GET['dathang'];
        }else{
          $tam ='';
        }
        if ($tam=='quanlidathang') {
          include("module/dondathang/lietke.php");
        }elseif ($tam=='quanlidathangdn') {
          include("module/donhangdn/lietke.php");}
        

        if (isset($_GET['trchu'])) {
          $tam=$_GET['trchu'];
        }else{
          $tam ='';
        }
        if ($tam=='trangchu') {
          include("module/trangchu.php");
        }elseif ($tam=='khachhang') {
          include("module/khachhang/lietkekh.php");
        }

       ?>
  </div>
</div>
