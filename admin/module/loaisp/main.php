<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-12 sidenav">
      <div class="left">
        <?php
		if (isset($_GET['ac'])) {
			$tam=$_GET['ac'];
		}else{
			$tam='';
		}if ($tam=='them') {
			include('module/loaisp/them.php');
		}if ($tam=='sua') {
			include('module/loaisp/sua.php');
		}
	    ?>
	   </div>
	</div>
  </div>
</div>















