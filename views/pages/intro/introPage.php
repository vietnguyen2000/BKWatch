<style>
  <?php
  ob_start();
  include 'introPage.css';
  $file_content = ob_get_contents();
  ob_end_clean();
  echo $file_content
  ?>
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<div class="container">
  <div class="top-body">
    <div class="row justify-content-between">
      <div class="col-12 col-sm-12 col-md-12 col-lg-6 left-top-body">
        <div>
          <div class="image-wrapper">
            <?php
            require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/introduction/bannerIntro.php');
            ?>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-6 right-top-body">
        <div class="intro-content">
          <div>
            <h3>Giới thiệu về BKWATCH</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ultrices sit amet ipsum vel luctus. Suspendisse eu libero felis. Sed eu malesuada odio. Sed facilisis sagittis mi et ornare. Vivamus finibus mollis nunc quis vestibulum. Pellentesque tempus blandit dictum. Nulla sem nibh, pretium in urna a, tristique ultrices felis. Morbi vel justo mi. Sed vel lobortis tortor. Nulla interdum nibh vel urna vulputate, sit amet viverra nunc tincidunt.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div>
    <div class="list-advantages">
      <div class="row justify-content-between">
        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
          <?php
          $icon = "watch";
          $title = "Hàng chính hãng";
          $des = "Hiện nay, đồng hồ là phụ kiện thời trang thiết yếu đối với những người đàn ông hiện đại ngày nay.";
          require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/introduction/cvIntroPage.php');
          ?>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
          <?php
          $icon = "new_releases";
          $title = "Sản phẩm mới 100%";
          $des = "Hiện nay, đồng hồ là phụ kiện thời trang thiết yếu đối với những người đàn ông hiện đại ngày nay.";
          require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/introduction/cvIntroPage.php');
          ?>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
          <?php
          $icon = "settings_suggest";
          $title = "Bảo hành 12 tháng";
          $des = "Hiện nay, đồng hồ là phụ kiện thời trang thiết yếu đối với những người đàn ông hiện đại ngày nay.";
          require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/introduction/cvIntroPage.php');
          ?>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
          <?php
          $icon = "history";
          $title = "Đổi trả trong vòng 7 ngày";
          $des = "Hiện nay, đồng hồ là phụ kiện thời trang thiết yếu đối với những người đàn ông hiện đại ngày nay.";
          require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/introduction/cvIntroPage.php');
          ?>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
          <?php
          $icon = "local_shipping";
          $title = "Miễn phí giao hàng";
          $des = "Hiện nay, đồng hồ là phụ kiện thời trang thiết yếu đối với những người đàn ông hiện đại ngày nay.";
          require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/introduction/cvIntroPage.php');
          ?>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
          <?php
          $icon = "price_check";
          $title = "Giá cả hợp lí";
          $des = "Hiện nay, đồng hồ là phụ kiện thời trang thiết yếu đối với những người đàn ông hiện đại ngày nay.";
          require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/introduction/cvIntroPage.php');
          ?>
        </div>
      </div>
    </div>
  </div>
</div>