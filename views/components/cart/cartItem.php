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
<div class="row g-0" id='cart-item-<?= $cartItem['id'] ?>'>
  <div class="col-4 hover-overlay ripple ripple-surface ripple-surface-light" style="aspect-ratio: 8/6">
    <a href="watch/<?= $cartItem['productId'] ?>">
      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
    </a>
    <img src="<?= $cartItem['imagePreview'] ?>" alt="<?= $cartItem['title'] ?>" class="img-fluid" style="width: 100%; height: 100%; object-fit:contain" />
  </div>
  <div class="col-8 d-flex justify-content-between flex-column px-2" style="aspect-ratio: 8/3">
    <div>
      <div class="row justify-content-between">
        <div class="col-12 col-sm">
          <h5 class="card-title"><?= $cartItem['title'] ?></h5>
        </div>
        <div class="col-auto right-body">
          <div class="def-number-input number-input safari_only mb-0 w-100" style="height:2rem">
            <button onclick="subtractQuantity(<?= $cartItem['id'] ?>, <?= $cartItem['price'] ?>, <?= $cartItem['discount'] ?>)" class="btn btn-danger h-100 py-0 px-3">-</button>
            <input min="0" name="quantity" id='cart-item-quantity-<?= $cartItem['id'] ?>' value="<?= $cartItem['quantity'] ?>" type="number" readonly>
            <button onclick="addMoreQuantity(<?= $cartItem['id'] ?>, <?= $cartItem['price'] ?>, <?= $cartItem['discount'] ?>)" class="btn btn-primary h-100 py-0 px-3">+</button>
          </div>
        </div>
      </div>
      <small class="card-text m-0">
        SKU: <?= $cartItem['productCode'] ?>
      </small>
      <br>
      <small class="card-text m-0">
        Brand: <?= $cartItem['brandTitle'] ?>
      </small>
      <br>
      <small class="card-text">
        Màu sắc: <?= $cartItem['color'] ?>
      </small>
    </div>

    <div class="d-flex justify-content-between align-items-end">
      <div>
        <a href="#!" type="button" class="card-link-secondary small text-uppercase me-3" data-mdb-toggle="modal" data-mdb-target="#cart-modal-<?= $cartItem['id'] ?>">
          <i class="fas fa-trash-alt mr-1"></i>
          <span class="d-none d-sm-inline-block">XÓA</span>
        </a>
        <a href="#!" type="button" class="card-link-secondary small text-uppercase" onclick="addToFavorite(<?= $cartItem['productId'] ?>)">
          <span class="heart-product-<?= $cartItem['productId'] ?> <?= (in_array($cartItem['productId'], $listFavoriteIds)) ? 'favorite-heart-active' : '' ?>">
            <i class="<?= (in_array($cartItem['productId'], $listFavoriteIds)) ? 'fas' : 'far' ?> fa-heart"></i>
          </span>
          <span class="d-none d-sm-inline-block">YÊU THÍCH</span>
        </a>
      </div>
      <div class="col-auto">
        <input hidden type="number" id='cart-item-default-price-<?= $cartItem['id'] ?>' value="<?= $cartItem['price'] ?>">
        <input hidden type="number" id='cart-item-default-discount-<?= $cartItem['id'] ?>' value="<?= $cartItem['price'] * $cartItem['discount'] / 100 ?>">
        <?php if ($cartItem['discount'] > 0) { ?>
          <p class="mb-0 text-decoration-line-through fw-light fs-6 text-end"><span id='cart-item-before-discount-<?= $cartItem['id'] ?>'><?= currency_format($cartItem['price'] * $cartItem['quantity']) ?></span></p>
        <?php } ?>

        <p class="mb-0 text-primary"><span><strong id='cart-item-price-<?= $cartItem['id'] ?>'><?= currency_format($cartItem['price'] * $cartItem['quantity'] * (100 - $cartItem['discount']) / 100) ?></strong></span></p>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="cart-modal-<?= $cartItem['id'] ?>" tabindex="-1" aria-labelledby="cart-modal-<?= $cartItem['id'] ?>-label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="cart-modal-<?= $cartItem['id'] ?>-label">Xác nhận xóa khỏi giỏ hàng</h5>
              <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Bạn có chắc chắn muốn xóa <?= $cartItem['title'] ?> ra khỏi giỏ hàng?</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-black" data-mdb-dismiss="modal">
                Đóng
              </button>
              <button type="button" class="btn btn-primary" onclick="removeCartItem(<?= $cartItem['id'] ?>)">Xóa</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>