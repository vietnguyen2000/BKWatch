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
<!-- <div class="col-6 col-md-4 col-lg-3 col-xl-2 my-2"> -->
<div class="card cardview-product-watch">
  <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
    <img src="<?= $product['imageURLs'][0] ?>" class="img-fluid" style="object-fit: contain; aspect-ratio: 7/8" alt="preview item id <?= $product['id'] ?>" />
    <a href="watch/<?= $product['id'] ?>">
      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
    </a>
  </div>
  <div class="card-body cardview-product-content p-2 pb-3" style="text-align:center;justify-content:center;">
    <div>
      <h6 class="card-title text-center" style="min-height: 60px;"><?= $product['title'] ?></h6>
    </div>
    <div>
      <p class="text-primary"><?= currency_format($product['price']) ?></p>
    </div>
    <div>
      <button class="btn btn-primary" onclick="addToCart(<?= $product['id'] ?>, '<?= $product['title'] ?>')">Thêm vào giỏ</button>
    </div>
  </div>
</div>
<!-- </div> -->