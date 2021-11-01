<style>
  <?php include 'categoryHome.css'; ?>
</style>
<div class="row category-fragment">
  <div class="col-12 col-sm-6 col-md-6 item-category-fragment">
    <?php
    $title_item_category = $title[0];
    $content_item_category = $content[0];
    $bg_item_category = $bg[0];
    require 'itemCategory.php';
    ?>
  </div>
  <div class="col-12 col-sm-6 col-md-6 item-category-fragment">
    <?php
    $title_item_category = $title[1];
    $content_item_category = $content[1];
    $bg_item_category = $bg[1];
    require 'itemCategory.php'
    ?>
  </div>
</div>