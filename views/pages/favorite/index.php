<div class="container-fluid container-xl mt-5 mb-5">
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
</div>