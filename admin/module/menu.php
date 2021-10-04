 <?php
         if (isset($_GET['ac'])&& $_GET['ac']=='logout') {
              unset($_SESSION['khach']);
              header('location: ../index.php?xem=dn');
            }
      ?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <ul class="nav navbar-nav">
      <li><a href="tc.php?trchu=trangchu">Trang chủ</a></li>
      <li><a href="tc.php?trchu=khachhang">Quản lý Khách hàng</a></li>
      <li><a href="tc.php?sanpham=quanlisanpham&ac=them">Quản lý sản phẩm</a></li>
      <li><a href="tc.php?loaisp=quanliloaisanpham&ac=them">Quản lý loại sản phẩm</a></li>
      <li><a href="tc.php?dathang=quanlidathang">Quản lý đơn hàng</a></li>
      <li><a href="tc.php?dathang=quanlidathangdn">Quản lý đơn hàng đăng nhập</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
       <li><a href="tc.php?ac=logout">Đăng Xuất</a></li>
      </ul>
        </div>
      </div>
    </form>
  </div>
</nav>