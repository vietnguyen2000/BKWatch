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
  <?php include_once 'favorite.css'; ?><?php include_once 'discount.css'; ?>
</style>
<!-- <div class="col-6 col-md-4 col-lg-3 col-xl-2 my-2"> -->
<div class="card cardview-product-watch" style="margin: 0 0 20px 0;">
  <div class="bg-image hover-overlay ripple w-100" style="aspect-ratio: 7/8" data-mdb-ripple-color="light">
    <img src="<?= $product['imageURLs'][0] ?>" class="img-fluid" style="object-fit: contain; aspect-ratio: 7/8" alt="preview item id <?= $product['id'] ?>" />
    <a href="/watch/<?= $product['id'] ?>">
      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
    </a>
    <div class="heart-product-<?= $product['id'] ?> favorite-heart <?= (in_array($product['id'], $listFavoriteIds)) ? 'favorite-heart-active' : '' ?>" onclick="addToFavorite(<?= $product['id'] ?>)">
      <i class="<?= (in_array($product['id'], $listFavoriteIds)) ? 'fas' : 'far' ?> fa-heart"></i>
    </div>

    <?php if ($product['discount']) { ?>
      <div class="discount-badges">
        -<?= $product['discount'] ?>%
      </div>
    <?php } ?>
  </div>
  <div class="card-body cardview-product-content p-2 pb-3" style="text-align:center;justify-content:center;">
    <div style="display: table;width: 100%;height: 4.5em; overflow: hidden; min-height: 60px;text-align: center;">
      <h6 class="card-title text-center" style="display: table-cell; 
      line-height: 1.5em;
      vertical-align: middle;"><?= $product['title'] ?></h6>
    </div>
    <div>
      <p class="text-primary"><?= currency_format($product['price'] * (100 - $product['discount']) / 100) ?></p>
    </div>
    <div>
      <button class="btn btn-primary" onclick="addToCart(<?= $product['id'] ?>, '<?= $product['title'] ?>')">Thêm vào giỏ</button>
    </div>
  </div>
</div>
<!-- </div> -->