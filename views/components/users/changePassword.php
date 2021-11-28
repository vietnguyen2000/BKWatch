<div class="container mt-5 mb-5">

    <!-- User Profile -->
    <div class="card my-5">

        <div class="container py-5 ">
            <h2 class="card-title">Thay đổi mật khẩu</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-3">
                    <?php require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/users/userGeneral.php'); ?>
                </div>


                <div class="card col-12 col-md-9">
                    <div class="my-3">
                        <form action="/me/password" method="POST">
                            <div class="form-outline mb-4">
                                <input type="password" id="oldPassword" class="form-control" name="oldPassword" />
                                <label class="form-label" for="oldPassword">Mật khẩu cũ</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="password" class="form-control" name="password" />
                                <label class="form-label" for="password">Mật khẩu mới</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="repeatPassword" class="form-control" name="repeatPassword" />
                                <label class="form-label" for="repeatPassword">Nhập lại mật khẩu</label>
                            </div>
                        </form>

                        <div class="float-end">
                            <div class="btn-group" role="group">
                                <button id="btn-submit" href="#" class="btn btn-primary btn-change-password" onclick="handleChangePassword()">Thay đổi</button>
                                <a id="btn-cancel" href="/me" class="btn btn-black btn-change-password">Huỷ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function handleChangePassword() {
        $(".btn-change-password").html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>').attr('disabled', true);
        const oldPassword = $('#oldPassword').val()
        const password = $('#password').val()
        const repeatPassword = $('#repeatPassword').val()
        $.post('/me/password', {
            password,
            oldPassword,
            repeatPassword
        }, (data) => {
            $("#btn-submit").html('Thay đổi').attr('disabled', false);
            $("#btn-cancel").html('Hủy').attr('disabled', false);
            if (!data.success) {
                $.showNotification({
                    type: "danger",
                    body: data.message,
                    duration: 3000,
                    direction: 'append'
                })
                return
            }

            $.showNotification({
                type: "primary",
                body: data.message,
                duration: 3000,
                direction: 'append'
            })

            fastGet('/me', false)

        })
    }
</script>