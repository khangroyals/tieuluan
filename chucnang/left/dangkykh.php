

  <div  action="#" class="col-sm-12" align="center"> 
       <div class="panel panel-default"  style="background-color: #FDE2CA;">
        <div class="panel-body">
          <h4>ĐĂNG KÝ</h4>
        </div>
       <form class="form-horizontal" action="index.php?xem=signup" method="post">
          <div class="form-group">
              <label class="control-label col-sm-2">Tên khách hàng:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="hoten" placeholder="Nhập họ tên..." width="20px" required>
              </div>
          </div>

          <div class="form-group">
              <label class="control-label col-sm-2">Tài khoản:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="taikhoan" placeholder="Nhập họ tên..." width="20px" required>
              </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" >Mật khẩu:</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" name="matkhau" placeholder="Nhập mật khẩu..." required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" >Xác nhận mật khẩu:</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" name="xacnhan" placeholder="Xác nhận..." required>
            </div>
          </div>

          <div class="form-group">
              <label class="control-label col-sm-2">Email:</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" name="email" placeholder="Nhập email..." width="20px" required>
              </div>
          </div>

          <div class="form-group">
              <label class="control-label col-sm-2">Địa chỉ:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="diachi" placeholder="Nhập địa chỉ..." width="20px" required>
              </div>
          </div>
          
          <div class="form-group">
                <label class="control-label col-sm-2">Số điện thoại:</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" name="dienthoai" placeholder="Nhập số..." width="20px" required>
                </div>
          </div>

          <div class="form-group">
              <div class="panel-body">
              <button type="submit" class="btn btn-default" name="dangki" id="dk">Đăng Kí</button>
              </div>
          </div>
            <p>Nếu bạn đã có tài khoản, vui lòng đăng nhập <a href="index.php?xem=dn">tại đây!.</a></p>
        </form>
      </div>
    </div>
  