 
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


 <div class="col-sm-9" align="center"> 
       <div class="panel panel-default"  style="background-color: #FDE2CA;">
        <div class="panel-body">
        Đơn hàng của tôi
        </div>
        <div class="panel-footer">
         <table width="100%" border="1" align="center">
  <tr align="center">
    <td>STT</td>
    <td>Tên sản phẩm</td>
    <td>ID sản phẩm</td>
    <td>Hình ảnh</td>
    <td>Giá bán</td>
    <td>Số lượng sản phẩm</td>
    <td>Trạng thái</td>
    <td colspan="3" align="center">Quản lý</td>
  </tr>
  <?php
    $sql_chitiet = mysqli_query($conn,"SELECT * FROM chitietdathangdn inner join khachhang on chitietdathangdn.idkh = khachhang.idkh where chitietdathangdn.idkh='".$_SESSION['idkh']."'");
    $i = 1;
    while ($dong = mysqli_fetch_array($sql_chitiet)) {
   
    ?>
  <tr align="center">
    <td><?php echo $i; ?></td> 
    <td><?php echo $dong['tensp'];?></td>
    <td><?php echo $dong['idsp']; ?></td>
    <td><img src="admin/module/sanpham/img/<?php echo $dong['hinhanh']?>" width="60" height="60"></td>
    <td><?php echo $dong['tongtien']; ?></td>
    <td align="center"><?php echo $dong['soluongsp']; ?></td>
    <td><?php echo $dong['trangthai']?> </td>
    <td><a href="module/sanpham/xuli.php?id=<?php echo $dong['idsp']?>"> Xóa</a></td>
    <td><a href="chucnang/right/khachhang/huydh.php?id=<?php echo $dong['iddhdn']?>">Hủy đơn hàng</a></td>
  </tr>
  <?php
    $i++;
    }
  ?>
</table>

        </div>
      </div>
    </div>