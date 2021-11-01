<style>
  <?php include 'trendingHome.css'; ?>
</style>
<div class="row trending-fragment">
  <div class="col-12 col-sm-6 col-md-6 item-trending-fragment">
    <?php
    $title_item_trending = $title[0];
    $bg_item_trending = $bg[0];
    require 'itemTrending.php';
    ?>
  </div>
  <div class="col-12 col-sm-6 col-md-6 item-trending-fragment">
    <?php
    $title_item_trending = $title[1];
    $bg_item_trending = $bg[1];
    require 'itemTrending.php'
    ?>
  </div>
</div>