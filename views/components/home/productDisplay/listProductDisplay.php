<style>
  <?php include 'productDisplay.css'; ?>
</style>
<div class="selling-products-fragment">
  <!-- Tabs navs -->
  <ul class="nav nav-tabs nav-fill mb-3" id="ldp-home-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="ldp-home-tab-1" data-mdb-toggle="tab" href="#ldp-home-tabs-1" role="tab" aria-controls="ldp-home-tabs-1" aria-selected="true">Sản phẩm phổ biến</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="ldp-home-tab-2" data-mdb-toggle="tab" href="#ldp-home-tabs-2" role="tab" aria-controls="ldp-home-tabs-2" aria-selected="false">Sản phẩm khuyến mãi</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="ldp-home-tab-3" data-mdb-toggle="tab" href="#ldp-home-tabs-3" role="tab" aria-controls="ldp-home-tabs-3" aria-selected="false">Sản phẩm mới</a>
    </li>
  </ul>
  <!-- Tabs navs -->

  <!-- Tabs content -->
  <div class="tab-content" id="ldp-home-content">
    <div class="tab-pane fade show active" id="ldp-home-tabs-1" role="tabpanel" aria-labelledby="ldp-home-tab-1">
      <div class="row justify-content-around">
        <?php
        for ($x = 0; $x < 10; $x++) {
          $item_in_row = 'col-3';
          require 'cardviewProduct.php';
        }
        ?>
        <div class="col my-2"> </div>
      </div>
    </div>
    <div class="tab-pane fade" id="ldp-home-tabs-2" role="tabpanel" aria-labelledby="ldp-home-tab-2">
      <div class="row justify-content-around">
        <?php
        for ($x = 0; $x < 5; $x++) {
          $item_in_row = 'col-3';
          require 'cardviewProduct.php';
        }
        ?>
        <div class="col my-2"> </div>
      </div>
    </div>
    <div class="tab-pane fade" id="ldp-home-tabs-3" role="tabpanel" aria-labelledby="ldp-home-tab-3">
      <div class="row justify-content-around">
        <?php
        for ($x = 0; $x < 15; $x++) {
          $item_in_row = 'col-3';
          require 'cardviewProduct.php';
        }
        ?>
        <div class="col my-2"> </div>
      </div>
    </div>
  </div>
  <!-- Tabs content -->
</div>