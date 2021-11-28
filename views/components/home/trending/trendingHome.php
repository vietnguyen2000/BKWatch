<style>
  <?php include 'trendingHome.css'; ?>
</style>
<?php
$title = [
  "LUXURY",
  "DRESS"
];
$bg = [
  "https://images3.alphacoders.com/874/thumb-1920-874739.jpg",
  "https://images8.alphacoders.com/492/thumb-1920-492436.jpg"
];
$trendingURL = [
  "/watch?search=luxury",
  "/watch?search=dress"
];
?>
<div class="row trending-fragment">
  <?php
  $i = 0;
  for ($i = 0; $i < count($title); $i++) {
    $title_item_trending = $title[$i];
    $bg_item_trending = $bg[$i];
    $url_item_trending = $trendingURL[$i];
    require 'itemTrending.php';
  }
  ?>
</div>