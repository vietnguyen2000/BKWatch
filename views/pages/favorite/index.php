<div class="container-fluid container-xl mt-5 mb-5">
    <?php if (count($data['products']) == 0) { ?>
        <div class="card mb-3">
            <div class="card-body">
                <h4>Bạn chưa yêu thích sản phẩm nào.</h4>
                <a href="/watch">Click vào đây</a> để chọn yêu thích sản phẩm.
            </div>
        </div>
    <?php } else { ?>
        <h3>
            Danh sách yêu thích
        </h3>
        <div class="row">
            <div class="col-12 col-lg-12">
                <?php
                $dataTop = $data;
                require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/favorite/top.php');
                ?>
                <?php
                require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/favorite/content.php');
                ?>
            </div>
        </div>
    <?php } ?>
</div>