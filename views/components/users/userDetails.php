<div class="col-lg-12">
  <div class=" mx-2">
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
        <p class="text-muted mb-0"><?= $user['address'] ? $user['address'] : 'Chưa có' ?></p>
      </div>
    </div>
    <hr>

    <!-- Logout button -->
    <div class="float-end" aria-label="">
      <div class="btn-group me-2 mb-2">
        <a href="/payment/history" class="btn btn-primary btn-submit">Lịch sử mua hàng</a>
      </div>

      <!-- <div class="btn-group mb-2">
        <a href="<?= ROOT_URL ?>/logout" class="btn btn-danger btn-submit">Đăng xuất</a>
      </div> -->


    </div>
  </div>
</div>