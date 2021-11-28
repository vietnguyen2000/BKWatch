<div class="container">
  <div style="margin:50px 0;">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6">
        <h2 class="card-title">Thông tin cá nhân</h2>
      </div>
      <div class="col-12 col-sm-12 col-md-6">
        <div style="display: flex; justify-content:flex-end;">
          <div class="d-flex flex-row-reverse flex-wrap" style="width:100%;">
            <div class="p-2">
              <a href="/me/edit" class="btn btn-white" style="width:100%;"><i class="fas fa-pen mr-2"></i><span class="d-md-inline"> Chỉnh sửa</span></a>
            </div>
            <div class="p-2">
              <a href="/changepw" class="btn btn-primary" style="width:100%;"><i class="fas fa-key mr-2"></i><span class="d-md-inline"> Đổi mật khẩu</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-md-3">
          <?php require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/users/userGeneral.php'); ?>
        </div>
        <div class="card col-12 col-md-9">
          <div>
            <?php require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/users/userDetails.php'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>