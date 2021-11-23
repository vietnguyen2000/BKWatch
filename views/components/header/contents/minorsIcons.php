<div class="d-none d-sm-block">
  <?php

  use Models\CartItemModel;

  $isLogged = isset($_SESSION['user']);
  if (!$isLogged) {
    echo
    '<a href="/login" class="ps-2 text-decoration-none">
        <i class="fas fa-sign-in-alt fa-2x"></i>
      </a>';
  } else {
    echo
    '<a href="/me" class="ps-2 text-decoration-none">
        <i class="fas fa-user-circle fa-2x"></i>
      </a>';
  }
  ?>

  </a>
  <a href="/favorite" class="ps-2 text-decoration-none">
    <i class="fas fa-heart fa-2x"></i>
  </a>

  <a href="/cart" class="ps-2 text-decoration-none">
    <i class="fas fa-shopping-cart fa-2x"></i>
    <?php
    if (isset($_SESSION['user'])) {
      $cartItemModel = new CartItemModel();
      $cartQuantity = $cartItemModel->getCartQuantity($_SESSION['user']['id']);
    ?>
      <span class="badge rounded-pill badge-notification bg-danger cart-badge"><?= $cartQuantity ?></span>
    <?php } ?>
  </a>
</div>