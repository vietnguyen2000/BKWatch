<div class="container mt-5 mb-5">
    <div class="card">
        <div class="p-3">
            <div class="row">
                <!-- <div class="col-12 col-lg-3">
                    <div>
                        <?php
                        require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/favorite/filter/nav.php');
                        ?>
                    </div>
                    <div>
                        <?php                    
                        require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/favorite/filter/menu.php');
                        ?>
                    </div>
                </div> -->
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
    </div>
</div>