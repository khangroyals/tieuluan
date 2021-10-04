<h1 align="center">Chi Tiết Sản Phẩm</h1>
<?php
      @$id = $_GET['id'];
      $sql = "select *from sanpham where idsp = '$id'";
      $query = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
  <style> 
    #ngang{
      border-bottom: 1px solid #DCDCDC;

    }
  </style>
</head>

<div class="col-sm-4" align="center"> 
       <div class="panel panel-default"  style="background-color: #FDE2CA;">
        <div class="panel-body">
           <img width="260px" height="312px" src="admin/module/sanpham/img/<?php echo $row['hinhanh']?>" alt="Image" id="anh">
        </div> 
      </div>
    </div>
    <div class="col-sm-6"> 
      <h3 align="left" id="namePro"><?php echo $row['tensp']; ?></h3>
      <p align="left">Giá: <b id="pricee"> <?php echo number_format($row['gia']).'đ'; ?>đ</b></p>
      <p id="ngang"></p><br>
      <div class="add-to-cart col-md-10 col-sm-10 col-sms-10" align="left">
        <label for="qty">Số lượng:</label>
        <input type="number" id="num" name="num" value="1" min="1">

        <button type="button" class="btn btn-primary"  onclick="addCart(<?php echo $row['idsp'];?>)" name="cart">Thêm vào giỏ hàng</button>
        <!-- <a href="?mod=sanpham&act=add_cart&id=<?php echo $row['idsp']?>"> <button type="button" class="btn btn-primary" >Đặt hàng</button></a>
        <!-- ngoc  -->
      </div><br><br><br><br>
      <p id="ngang"></p>
      <h4 align="left">Thông số sản phẩm</h4>
      <p align="left">Khối lượng vàng: <b id="pricee"> <?php echo $row['khoiluong'].' '; ?> chỉ vàng</b></p>
      <p align="left">Tuổi vàng:  <b id="pricee"> <?php echo number_format($row['tuoivang']).'K'; ?></b></p>
      <p align="left">Chủng loại:  <b id="pricee"> <?php echo $row['chungloai']; ?></b></p>

    </div>
<div class="col-sm-10">
<h3 align="left" >Giới thiệu sản phẩm</h4>
<p align="left"><?php echo $row['noidung']; ?></p>
</div>