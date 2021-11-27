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

  $isLogged = isset($_SESSION['user']);
  if (!$isLogged) { ?>
    <a href="<?= ROOT_URL ?>/login" class="ps-2 text-decoration-none">
      <i class="fas fa-sign-in-alt fa-2x"></i>
    </a>
  <?php } else { ?>
    <div class="dropdown d-inline-block dropstart" style=>
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
        <li>
          <a href="/logout" class="dropdown-item" style="color: black">Đăng xuất</a>
        </li>
      </ul>
    </div>
  <?php }
  ?>
  <a href="<?= ROOT_URL ?>/favorite" class="ps-2 text-decoration-none">
    <i class="fas fa-heart fa-2x"></i>
  </a>

  <a href="<?= ROOT_URL ?>/cart" class="ps-2 text-decoration-none">
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