<style>
  <?php require "cart.css" ?>
</style>
<div class="card mb-3">
  <div class="card-body">
    <?php
    $__countItem = count($data['listCartItems']);
    for ($i = 0; $i < $__countItem; $i++) {
      $product = $data['listCartItems'][$i];
      $product['imagePreview'] = explode('||', $product['imageURL'])[0];
      require "cartItem.php";
      if ($i != $__countItem - 1) {
    ?>
        <hr>
    <?php }
    } ?>
  </div>
</div>