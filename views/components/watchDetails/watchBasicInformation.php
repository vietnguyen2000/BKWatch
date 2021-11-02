<?php
if (!function_exists('currency_format')) {
  function currency_format($number, $suffix = 'đ')
  {
    if (!empty($number)) {
      return number_format($number, 0, ',', '.') . "{$suffix}";
    }
  }
}
?>
<div>
  <div class="row">
    <h3>
      <?php if ($product['isNew']) { ?>
        <span class="badge bg-primary">NEW</span>
      <?php } ?>

      <?php if ($product['isHot']) { ?>
        <span class="badge bg-primary">HOT</span>
      <?php } ?>

      <?php if ($product['isBestSale']) { ?>
        <span class="badge bg-primary">BEST SALE</span>
      <?php } ?>
    </h3>
  </div>

  <div class="row justify-content-between">
    <div class="col-xl">
      <h3><?= $product['title'] ?></h3>
    </div>
    <div class="col-xl-auto text-end">
      <h3><?= currency_format($product['price']) ?></h3>
    </div>
  </div>
  <hr>

  <div class="row">
    <div class="col-3">
      SKU:
    </div>
    <div class="col-9 text-end">
      <?= $product['productCode'] ?>
    </div>
  </div>
  <hr>

  <div class="row">
    <div class="col-3">
      Brand:
    </div>
    <div class="col-9 text-end">
      <?= $product['brandTitle'] ?>
    </div>
  </div>
  <hr>

  <div class="row">
    <div class="col-3">
      Category:
    </div>
    <div class="col-9 text-end">
      <?= $product['categoryTitle'] ?>
    </div>
  </div>
  <hr>

  <div class="row">
    <div class="col-lg-6">
      <button class="btn btn-black w-100 me-lg-2 mb-2 mb-lg-0" type="button">
        <h6 class="mb-0"> Add to favorite <i class="far fa-heart"></i></h6>
      </button>
    </div>

    <div class="col-lg-6">
      <button class="btn btn-primary w-100" type="button">
        <h6 class="mb-0"> Add to cart <i class="fas fa-cart-plus"></i></h6>
      </button>
    </div>
  </div>

</div>