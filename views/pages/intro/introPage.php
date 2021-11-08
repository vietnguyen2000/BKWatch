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
            <p>Ra mắt năm 2021, nền tảng thương mại điện tử BKWATCH được xây dựng nhằm cung cấp cho người sử dùng những trải nghiệm dễ dàng, an toàn và nhanh chóng khi mua sắm trực tuyến thông qua hệ thống hỗ trợ thanh toán và vận hành vững mạnh. </br>Chúng tôi có niềm tin mạnh mẽ rằng trải nghiệm mua sắm trực tuyến phải đơn giản, dễ dàng và mang đến cảm xúc vui thích. Niềm tin này truyền cảm hứng và thúc đẩy chúng tôi mỗi ngày tại BKWATCH.</p>
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