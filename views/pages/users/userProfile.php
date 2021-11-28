<div class="container mt-5 mb-5">

    <!-- User Profile -->
    <div class="card">        

        <div class="card-header bg-info">            
            <div class="btn-group float-end" role="group" aria-label="">          
                <a href="/me/edit" class="btn btn-secondary"><i class="fas fa-pen mr-2"></i><span class="d-none d-md-inline"> Cập nhật</span></a>
            </div>
            <h2 class="card-title">Thông tin cá nhân</h2>
        </div>        
        <div class="card-body">            
            <div class="row">
                <div class="col-12 col-md-3">
                    <?php require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/users/userGeneral.php');?>
                </div>
                

                <div class="card col-12 col-md-9">
                    <div class="card-body">
                        <?php require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/users/userDetails.php');?>
                    </div>
                </div>
            </div>
        </div>
    </div>    

    <!-- Logout button -->
    <div class="btn-group float-end" role="group" aria-label="">           
        <a href="/logout" class="btn btn-danger">Đăng xuất</a>
    </div>
    <div class="clearfix"></div>
</div>