<div class="col-lg-12">
  <div class="card-body">
    <div class="row">
      <div class="col-sm-3">
        <p class="mb-0">Họ và tên</p>
      </div>
      <div class="col-sm-9">
        <p class="text-muted mb-0"> <?php echo $user['fullname'] ?></p>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-3">
        <p class="mb-0">Email</p>
      </div>
      <div class="col-sm-9">
        <p class="text-muted mb-0"><?php echo $user['email'] ?></p>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-3">
        <p class="mb-0">Số điện thoại</p>
      </div>
      <div class="col-sm-9">
        <p class="text-muted mb-0"><?php echo $user['phoneNumber'] ?></p>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-3">
        <p class="mb-0">Giới tính</p>
      </div>
      <div class="col-sm-9">
        <p class="text-muted mb-0"><?php echo $user['gender'] ? "Nam" : "Nữ" ?></p>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-3">
        <p class="mb-0">Địa chỉ</p>
      </div>
      <div class="col-sm-9">
        <p class="text-muted mb-0"><?php echo $user['address'] ?></p>
      </div>
    </div>

    <!-- Logout button -->
    <div class="float-end" aria-label="">
      <div class="btn-group  me-2">
        <a href="/payment/history" class="btn btn-black btn-submit">Lịch sử mua hàng</a>
      </div>

      <div class="btn-group ">
        <a href="/logout" class="btn btn-primary btn-submit">Đăng xuất</a>
      </div>


    </div>
  </div>
</div>