
<?php
  include('chucnang/connect.php');
  include('chucnang/right/ghang/ham.php');
 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hệ thống cửa hàng hoa cao cấp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="js/jquery-2.2.3.min.js"> </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
  <script type="text/javascript">
    (function(){

    function scroller() {

      var scroll = $('div.scroll');// Sets the div with a class of scroll as a variable
      
      var height = scroll.height(); // Gets the height of the scroll div
      
      var topAdj = -height-100; /* '-height' turns the height                   of the UL into a negative #, 
                   * '- 50' subtracts an extra 50 pixels from the height of 
                   * the div so that it moves the trail of the UL higher to 
                   * the top of the div before the animation                ends
                   */
      
      scroll.animate({
        'top' : [topAdj, 'linear'] 
      }, 10000, function(){
        scroll.css('top', 0); //resets the top position of the Ul for the next cycle
        scroller(); // Recalls the animation cycle to begin.
      });}
      
    scroller();

    })();
  </script>
  <style>
    .row.content {height: 1200px;}
    
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 0px;
      }
      .row.content {height: auto;} 
    }

    .f-grid a {
    color: #0879c9;
    font-size: 15px;
}

a.price-mar {
    color: #ef0e0e;
    display: block;
}
/*-- scroll --*/
.scroll {
    position: absolute;
    overflow:visible;
}

.box-scroll {
    min-height: 25em;
    position: relative;
    overflow: hidden;
}
  </style>
</head>
<body>
  <div>
    <?php
      include("chucnang/header.php");
      include("chucnang/menu.php");
      include("chucnang/conten.php");
      include("chucnang/footer.php");
    ?>
  </div>

  <script>
    function addCart(idsp){
      num = $("#num").val();
      $.post('chucnang/right/ghang/addCart.php', {'id': idsp,'num':num}, function(data){
          img = $("#anh").attr("src");
          $("#nameCart").text($("#namePro").text()); 
          $("#price").text($("#pricee").text()); 
          $("#qty").text(num); 
          $("#anhh").attr({
            'src':img,
          });
          $('#showCart').modal();
          $('#numberCart').text(data);
      });
    }
    function updateCart(idsp){
      num = $('#quantity_'+idsp).val();
      $.post('chucnang/right/ghang/updateCart.php', {'id': idsp,'num':num}, function(data){
          $("#listCart").load("http://localhost/new/index.php?xem=giohang #cartx");
        });
    }
    function deleteCart(idsp){
      num = $('#quantity_'+idsp).val();
      $.post('chucnang/right/ghang/updateCart.php', {'id': idsp,'num':0}, function(data){
          $("#listCart").load("http://localhost/new/index.php?xem=giohang #cartx");
        });
    }
</script>


<div class="modal fade" tabindex="-1" id="showCart" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Thông Tin Mua Hàng</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
              <a href="" class="thumbnail">
                <img id="anhh" alt="">
              </a>
          </div>
          <div class="col-md-6">
            <p>Tên sản phẩm: <span id="nameCart"></span></p>
            <p>Giá sản phẩm: <span id="price"></span></p>
            <p>Số lượng sản phẩm: <span id="qty"></span></p>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
</html>
