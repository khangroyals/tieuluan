<?php
  
      @$id = $_GET['id'];
     
     if (isset($_GET['trang'])) {
        $get_trang = $_GET['trang'];
      }else{
        $get_trang='';
      }
       if ($get_trang=='' || $get_trang=='1') {
        $trang1 = 0;
      }else{
        $trang1 = ($get_trang*6)-6;
      }
      $sql = "select *from sanpham limit $trang1,6";
       $query = mysqli_query($conn, $sql);
?>
      
      <?php if (isset($_SESSION['success'])) :?>
        <p> <?= $_SESSION['success'] ?></p>
      <?php endif; unset($_SESSION['success']) ?>
<?php
      while ($row = mysqli_fetch_array($query)){ 
?>

      <div class="col-sm-4" align="center"> 
       <div class="panel panel-default"  style="background-color: #FDE2CA;">
        <div class="panel-body">
           <img width="260px" height="312px" src="admin/module/sanpham/img/<?php echo $row['hinhanh']?>" alt="Image">
        </div>
        <div class="panel-footer">
         <h4><?php echo $row['tensp']?></h4>
         <h2><?php echo number_format($row['gia']).'đ'?></h2>
         <a href="index.php?xem=chi_tiet_sp&id=<?php echo $row['idsp']?>"><button type="button" class="btn btn-primary" >Xem chi tiết</button></a>

        </div>
      </div>
    </div>
  <?php }?>
   <p style="clear:both;">
    
  </p>
  <p>
    Trang:
  <?php 
      $sql_trang = "select *from sanpham order by idsp desc";
      $query_trang = mysqli_query($conn, $sql_trang);
      $count = mysqli_num_rows($query_trang);
      $a = ceil($count/6);
      for($b=1;$b<=$a; $b++){
        echo '<a href="?trang='.$b.'">'.' '. '['. $b. ']'. ' '. '</a>';
      }

  ?>
  </p>

    
    