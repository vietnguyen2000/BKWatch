<style>
  <?php include_once 'productDisplay.css'; ?>
</style>
<div class="selling-products-fragment">
  <ul class="nav nav-tabs mb-3" id="sp-home-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="sp-home-tab-1" data-mdb-toggle="tab" href="#sp-home-tabs-1" role="tab" aria-controls="sp-home-tabs-1" aria-selected="true">Sản phẩm bán chạy</a>
    </li>
  </ul>
  <div class="tab-content" id="sp-home-content">
    <div class="tab-pane fade show active" id="sp-home-tabs-1" role="tabpanel" aria-labelledby="sp-home-tab-1">
      <?php
      // require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/watchPreview/rawPreview.php');
      ?>
      <div class="row justify-content-around">
        <?php
        foreach ($data['products'] as $product) {
          if (!$product['isBestSale']) continue;
          echo '<div class="col-6 col-md-4 col-lg-3 col-xl-2 my-2">';
          require 'cardviewProduct.php';
          echo '</div>';
        }
        ?>
        <div class="col my-2"> </div>
      </div>
    </div>
  </div>
</div>