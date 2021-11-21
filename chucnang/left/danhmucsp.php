
<h4>DANH MỤC SẢN PHẨM</h4>
<?php
     
      $sql = "select *from loaisp order by idloaisp desc";
      $query = mysqli_query($conn, $sql);
  
?>
      <ul class="nav nav-pills nav-stacked">
        <?php
            while ($row= mysqli_fetch_array($query)) {  
        ?>
        <li><a href="index.php?xem=menu&id=<?php echo $row['idloaisp'] ?>"><?php echo $row['tenloaisp']?></a></li>
        <?php } ?>
      </ul><br>
      <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="input-group">
        <table>
          <tr>
        <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm...." name="searchtext">
        <span class="input-group-btn">
        <input class="btn btn-default" type="submit" name="ok"  placeholder="Search">
        </span>
      </tr>
    </table>
      </div>
    </div>
    </form>

<!-- Thêm một dòng mới dô đây  -->

<p style="clear: both;"></p>
<!-- <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "new";
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      $sql1= "select * from sanpham order by idsp desc";
      $sql_product_sidebar = mysqli_query($conn,$sql1); 
?>
    
<div class="left-side border-bottom py-2">
      <div class="f-grid py-2">
              <h3 class="agileits-sear-head mb-3">Sản phẩm bán chạy</h3>
              <div class="box-scroll">
                <div class="scroll" >
                  <?php 
                 
                  while ($row_sanpham_sidebar = mysqli_fetch_array($sql_product_sidebar)) {
                  ?>

                  <div class="row">
                    <div class="col-lg-3 col-sm-2 col-3 left-mar">
                      <img src="admin/module/sanpham/img/<?php echo $row_sanpham_sidebar['hinhanh'] ?>" alt="" class="img-fluid" width="50px" hieght="50px">
                    </div>
                    <div class="col-lg-9 col-sm-10 col-9 w3_mvd">
                      <a href=""><?php echo $row_sanpham_sidebar['tensp'] ?></a><br>
                      <a href="" class="price-mar mt-2"><?php echo number_format($row_sanpham_sidebar['gia']).'VND' ?></a>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div> -->

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3932.0598420457077!2d105.60232731409813!3d9.760998779783517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0f1d1e88956ef%3A0xef7a6de6658fee0c!2zxJDhuqFpIEjhu41jIEPhuqduIFRoxqEgS2h1IEjDsmEgQW4!5e0!3m2!1svi!2s!4v1586271577535!5m2!1svi!2s" width="350" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> 


      
  