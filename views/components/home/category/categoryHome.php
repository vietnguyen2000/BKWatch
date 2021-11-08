<style>
  <?php include 'categoryHome.css'; ?>
</style>
<?php
$title = [
  "CỔ ĐIỂN",
  "SMART WATCH"
];
$content = [
  "Đa dạng về phong cách, kiểu dáng, màu sắc, kích cỡ...",
  "Đa dạng về phong cách, kiểu dáng, màu sắc, kích cỡ..."
];
$bg = [
  "https://images4.alphacoders.com/573/thumb-1920-573096.jpg",
  "https://wallpaperaccess.com/full/2067364.jpg"
];
?>
<div class="row category-fragment">
  <?php
  $i = 0;
  for ($i = 0; $i < count($title); $i++) {
    $title_item_category = $title[$i];
    $content_item_category = $content[$i];
    $bg_item_category = $bg[$i];
    require 'itemCategory.php';
  }
  ?>
</div>