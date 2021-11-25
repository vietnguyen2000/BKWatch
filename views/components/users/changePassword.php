<div class="container mt-9 md-9">
    <div class="row">
        <div class="col-md-5">
            <h3 class="text-primary">Đổi mật khẩu</h3>
            <form method="POST" action="" id="formChangePass">
                <div class="form-group">
                    <label for="user_signin">Mật khẩu cũ</label>
                    <input type="password" name="old_pass" class="form-control" id="old_pass">
                </div>
                <div class="form-group">
                    <label for="user_signin">Mật khẩu mới</label>
                    <input type="password" name="new_pass" class="form-control" id="new_pass">
                </div>
                <div class="form-group">
                    <label for="user_signin">Nhập lại mật khẩu mới</label>
                    <input type="password" name="re_new_pass" class="form-control" id="re_new_pass">
                </div>
                <a href="index.php" class="btn btn-default">
                    <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                </a>
                <button class="btn btn-primary" id="submit_change_pass" type="submit" name="btn-changepw">
                    <span class="glyphicon glyphicon-ok"></span> Thay đổi
                </button>
            </form>
        </div>
    </div>
</div>