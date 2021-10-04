<?php
     
       $queryy = "SELECT * FROM sanpham where tensp like '%bạc%' and chungloai like '%Nữ%'";
       $sqll = mysqli_query($conn,$queryy);
        while ($row = mysqli_fetch_array($sqll)){
        ?>
        <div class="col-sm-4"> 
        <div class="panel panel-default">
         <div class="panel-body">
            <img width="260px" height="312px" src="admin/module/sanpham/img/<?php echo $row['hinhanh']?>" alt="Image">
         </div>
        <div class="panel-footer">
            <h4><?php echo $row['tensp']?></h4>
            <h2><?php echo number_format($row['gia']).'đ'?></h2>
            <a href="index.php?xem=chi_tiet_sp&id=<?php echo $row['idsp']?>"><button type="button" class="btn btn-primary">Xem chi tiết</button></a>
         </div>
         </div>
         </div>
      <?php }
        ?>
        <p style="clear: both;"></p>
