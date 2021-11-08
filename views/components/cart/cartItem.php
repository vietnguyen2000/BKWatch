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
<div class="row g-0">
  <div class="col-4 hover-overlay ripple ripple-surface ripple-surface-light" style="aspect-ratio: 8/6">
    <a href="watch/<?= $product['id'] ?>">
      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
    </a>
    <img src="<?= $product['imagePreview'] ?>" alt="<?= $product['title'] ?>" class="img-fluid" style="width: 100%; height: 100%; object-fit:contain" />
  </div>
  <div class="col-8 d-flex justify-content-between flex-column px-2" style="aspect-ratio: 8/3">
    <div class="d-flex justify-content-between">
      <div>
        <h5 class="card-title"><?= $product['title'] ?></h5>
        <p class="card-text m-0">
          SKU: <?= $product['productCode'] ?>
        </p>
        <p class="card-text m-0">
          Brand: <?= $product['brandTitle'] ?>
        </p>
        <p class="card-text">
          Màu sắc: <?= $product['color'] ?>
        </p>
      </div>
      <div class="col-auto">
        <div class="def-number-input number-input safari_only mb-0 w-100" style="height:2rem">
          <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn btn-danger h-100 py-0 px-3">-</button>
          <input min="0" name="quantity" value="<?= $product['quantity'] ?>" type="number" readonly>
          <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn btn-primary h-100 py-0 px-3">+</button>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <a href="#!" type="button" class="card-link-secondary small text-uppercase me-3"><i class="fas fa-trash-alt mr-1"></i> REMOVE </a>
        <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i class="fas fa-heart mr-1"></i> WISH LIST </a>
      </div>
      <div class="col-auto">
        <p class="mb-0 price"><span><strong><?= currency_format($product['price'] * $product['quantity']) ?></strong></span></p>
      </div>

    </div>
  </div>
</div>