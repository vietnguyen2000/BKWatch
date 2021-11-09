<style>
  <?php require "cart.css";
  $__countItem = count($data['listCartItems']);
  ?>
</style>
<div class="card mb-3">
  <div class="card-body">
    <?php if ($__countItem == 0) { ?>
      <h4>Giỏ hàng bạn đang trống.</h4>
      <a href="/watch">Click vào đây</a> để tìm kiếm sản phẩm.
    <?php } else { ?>
      <h4>Cart (<?= $__countItem ?> món hàng)</h4>
    <?php } ?>
    <?php
    for ($i = 0; $i < $__countItem; $i++) {
      $cartItem = $data['listCartItems'][$i];
      $cartItem['imagePreview'] = explode('||', $cartItem['imageURL'])[0];
      require "cartItem.php";
      if ($i != $__countItem - 1) {
    ?>
        <hr>
    <?php }
    } ?>
  </div>
</div>