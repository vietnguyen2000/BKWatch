<style>
  .dropdown:hover>.dropdown-menu {
    display: block;
  }

  .dropdown>.dropdown-toggle:active {
    /*Without this, clicking will make it sticky*/
    pointer-events: none;
  }
</style>
<div class="d-none d-sm-block">
  <?php

  use Models\CartItemModel;
  use Models\UserFavoriteItemModel;

  $isLogged = isset($_SESSION['user']);
  if (!$isLogged) {
  ?>
    <a href="/login" class="ps-2 text-decoration-none">
      <i class="fas fa-sign-in-alt fa-2x"></i>
    </a>
  <?php } else {
    $user = $_SESSION['user'];
  ?>
    <div class="dropdown d-inline-block dropstart">
      <a href="/me" class="ps-2 text-decoration-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle fa-2x"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" data-mdb-popper="none">
        <li>
          <a href="/me" class="dropdown-item" style="color: black">Trang cá nhân</a>
        </li>
        <li>
          <a href="/payment/history" class="dropdown-item" style="color: black">Lịch sử mua hàng</a>
        </li>
        <?php
        if ($user['role'] == 1) { ?>
          <li>
            <a href="<?= ROOT_URL . '/cms' ?>" class="dropdown-item" style="color: black">Trang admin</a>
          </li>
        <?php }
        ?>
        <li>
          <a href="<?= ROOT_URL ?>/logout" class="dropdown-item" style="color: black">Đăng xuất</a>
        </li>
      </ul>
    </div>
  <?php }
  ?>
  <a href="/favorite" class="ps-2 text-decoration-none">
    <i class="fas fa-heart fa-2x"></i>
    <?php
    global $listFavoriteIds;
    if (isset($_SESSION['user'])) {
      $favoriteItemModel = new UserFavoriteItemModel();
      $listFavoriteIds = $favoriteItemModel->getFavoriteIds($_SESSION['user']['id']);
      $favoriteQuantity = count($listFavoriteIds);
    ?>
      <span class="badge rounded-pill badge-notification bg-danger wishlist-badge" <?= $favoriteQuantity == 0 ? 'style="display: none;"' : '' ?>><?= $favoriteQuantity ?></span>
    <?php } ?>
  </a>

  <a href="/cart" class="ps-2 text-decoration-none">
    <i class="fas fa-shopping-cart fa-2x"></i>
    <?php
    if (isset($_SESSION['user'])) {
      $cartItemModel = new CartItemModel();
      $cartQuantity = $cartItemModel->getCartQuantity($_SESSION['user']['id']);
      if (!isset($cartQuantity)) {
        $cartQuantity = 0;
      }
    ?>
      <span class="badge rounded-pill badge-notification bg-danger cart-badge" <?= $cartQuantity == 0 ? 'style="display: none;"' : '' ?>><?= $cartQuantity ?></span>
    <?php } ?>
  </a>
</div>