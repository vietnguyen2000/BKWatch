<div class="container mt-5 mb-5">

    <!-- User Profile -->
    <div class="card my-5">

        <div class="container py-5 ">
            <div class="btn-group float-end" role="group" aria-label="">
                <a href="/me/edit" class="btn btn-white"><i class="fas fa-pen mr-2"></i><span class="d-none d-md-inline"> Cập nhật thông tin</span></a>

                <a href="/me/password" class="btn btn-primary"><i class="fas fa-key mr-2"></i><span class="d-none d-md-inline"> Đổi mật khẩu</span></a>
            </div>
            <h2 class="card-title">Thông tin cá nhân</h2>
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