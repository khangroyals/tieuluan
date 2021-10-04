
<?php
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
          </div>
