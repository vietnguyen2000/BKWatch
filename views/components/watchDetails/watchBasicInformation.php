<?php
if (!function_exists('currency_format')) {
  function currency_format($number, $suffix = 'đ')
  {
    if (!empty($number)) {
      return number_format($number, 0, ',', '.') . "{$suffix}";
    }
  }
}

use Models\UserFavoriteItemModel;

if (!isset($listFavoriteIds)) {

  if (isset($_SESSION['user'])) {
    $favoriteItemModel = new UserFavoriteItemModel();
    $listFavoriteIds = $favoriteItemModel->getFavoriteIds($_SESSION['user']['id']);
  } else {
    $listFavoriteIds = [];
  }
}

?>
<style>
  <?php include_once 'favorite.css'; ?>
</style>
<div>
  <div class="row">
    <h5>
      <?php if ($product['isNew']) { ?>
        <span class="badge bg-primary">NEW</span>
      <?php } ?>

      <?php if ($product['isHot']) { ?>
        <span class="badge bg-primary">HOT</span>
      <?php } ?>

      <?php if ($product['isBestSale']) { ?>
        <span class="badge bg-primary">BEST SALE</span>
      <?php } ?>
    </h5>
  </div>

  <div class="row justify-content-between">
    <h3><?= $product['title'] ?></h3>
    <h6><?php require 'watchRating.php' ?></h6>
    <?php if ($product['discount']) { ?>
      <span style="text-decoration: line-through;"><?= currency_format($product['price']) ?></span>
    <?php } ?>
    <h4><?= currency_format($product['price'] * (100 - $product['discount']) / 100) ?></h4>
  </div>
  <hr>

  <div class="row">
    <div class="col-3">
      SKU
    </div>
    <div class="col-9 text-end">
      <?= $product['productCode'] ?>
    </div>
  </div>
  <hr>

  <div class="row">
    <div class="col-3">
      Brand
    </div>
    <div class="col-9 text-end">
      <?= $product['brandTitle'] ?>
    </div>
  </div>
  <hr>

  <div class="row">
    <div class="col-3">
      Category
    </div>
    <div class="col-9 text-end">
      <?= $product['categoryTitle'] ?>
    </div>
  </div>
  <hr>

  <div class="row mt-lg-5">
    <div class="col-lg-6">
      <button class="btn btn-black w-100 me-lg-2 mb-2 mb-lg-0" type="button" onClick="addToFavorite(<?= $product['id'] ?>, '<?= $product['title'] ?>')">
        <h6 class="mb-0"> Yêu thích
          <span class="heart-product-<?= $product['id'] ?> <?= (in_array($product['id'], $listFavoriteIds)) ? 'favorite-heart-active' : '' ?>">
            <i class="<?= (in_array($product['id'], $listFavoriteIds)) ? 'fas' : 'far' ?> fa-heart"></i>
          </span>
        </h6>
      </button>
    </div>

    <div class="col-lg-6">
      <button class="btn btn-primary w-100" type="button" onClick="addToCart(<?= $product['id'] ?>, '<?= $product['title'] ?>')">
        <h6 class="mb-0"> Thêm vào giỏ <i class="fas fa-cart-plus"></i></h6>
      </button>
    </div>
  </div>

</div>