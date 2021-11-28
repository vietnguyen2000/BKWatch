<div class="container">
  <div style="margin: 50px 0;">
    <div class="row justify-content-around">
      <div class="col-10 col-sm-9 col-md-6 col-lg-5">
        <div class="d-flex justify-content-center">
          <div class="p-2 flex-fill">
            <h3 class="text-primary">Đổi mật khẩu</h3>
            <form method="POST" action="" id="formChangePass">
              <div class="form-group" style="margin: 0 0 25px 0;">
                <label for="user_signin">Mật khẩu cũ</label>
                <input type="password" name="old_pass" class="form-control" id="old_pass">
              </div>
              <div class="form-group" style="margin: 0 0 25px 0;">
                <label for="user_signin">Mật khẩu mới</label>
                <input type="password" name="new_pass" class="form-control" id="new_pass">
              </div>
              <div class="form-group" style="margin: 0 0 25px 0;">
                <label for="user_signin">Nhập lại mật khẩu mới</label>
                <input type="password" name="re_new_pass" class="form-control" id="re_new_pass">
              </div>
              <div class="d-flex flex-row-reverse">
                <div class="p-2">
                  <button class="btn btn-primary" id="submit_change_pass" type="submit" name="btn-changepw">
                    <span class="glyphicon glyphicon-ok"></span> Thay đổi
                  </button>
                </div>
                <div class="p-2">
                  <a href="/me" class="btn btn-default">
                    <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>