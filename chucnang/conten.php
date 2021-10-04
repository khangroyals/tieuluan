
<div class="container-fluid" >
  <div class="col-sm-16">
    <div class="col-sm-3">
      <div class="left">
        <?php
          include("chucnang/left/danhmucsp.php");
        ?>
      </div>
      <div class="right">

        <div class="col-sm-9">
        <?php
          if(isset($_GET['xem'])){
            $tam=$_GET['xem'];
          }else{
            $tam='';
          }if($tam=='chi_tiet_sp'){
            include("chucnang/right/sanpham/chi_tiet_sp.php");
          }elseif(isset($_POST['ok'])){
            include("chucnang/left/seach.php");
          }elseif($tam=='menu'){
            include("chucnang/right/sanpham/chitietloaisp.php");
          }elseif($tam=='giohang'){
            include("chucnang/right/ghang/cart.php");
          }elseif($tam=='addd_cart'){
            include("chucnang/right/sanpham/add_cart.php");
          }elseif($tam=='dn'){
            include("dn.php");
          }elseif($tam=='dk'){
            include("chucnang/left/dangkykh.php");
           }elseif($tam=='main'){
            include("chucnang/right/khachhang/main.php");
          }elseif($tam=='dhan'){
            include("chucnang/right/khachhang/donhang.php");
          }
          //Đăng nhập
          elseif($tam=='login'){
            include("chucnang/menu.php");
          }
          //Đăng ký
          elseif($tam=='signup'){
            include("chucnang/menu.php");
          }
          elseif($tam=='muahang'){
            include("chucnang/right/ghang/muahang.php");
          }elseif($tam=='dathang'){
            include("chucnang/right/ghang/xulimuahang.php");
          }elseif($tam=='gioithieu'){
            include("chucnang/gioithieu.php");
          }elseif($tam=='tsvnu'){
            include("chucnang/left/menu/vangnu.php");
          }elseif($tam=='tsbnu'){
            include("chucnang/left/menu/bacnu.php");
          }elseif($tam=='tsvnam'){
            include("chucnang/left/menu/vangnam.php");
          }elseif($tam=='tsbnam'){
            include("chucnang/left/menu/bacnam.php");
          }else{
            include("chucnang/right/sanpham/all_sp.php");
          }
        ?>
      </div>
      </div>
    </div>
    </div>
</div>