<?php
      
      $search = $_POST['ok'];
?>
<?php
        // Nếu người dùng submit form thì thực hiện
         if (isset($_REQUEST['ok'])) 
            {
            $search = addslashes($_POST['searchtext']);
            if (empty($search)) {
                echo "Vui lòng nhập dữ liệu vào ô tìm kiếm";
            } 
            else
            {
                $queryy = "SELECT * FROM sanpham where tensp like '%$search%' or gia like '%$search%'";
                $sqll = mysqli_query($conn,$queryy);
 
               $num = mysqli_num_rows($sqll);
                if ($num > 0 && $search != "") 
                {
                  ?>
                    <h4 align="center"><?php echo "$num kết quả trả về với từ khóa <b>$search</b>";?> </h4>
                    <?php
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
                    <?php
                } }                else {
                    echo "Không tìm thấy kết quả!";
                }
            }
        } 
            
        ?>
        <p style="clear: both;"></p>
    

    