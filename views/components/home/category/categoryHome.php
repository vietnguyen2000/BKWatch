<style>
  <?php include 'categoryHome.css'; ?>
</style>
<?php
$title = [
  "ROLEX",
  "SMART WATCH"
];
$content = [
  "Đa dạng về phong cách, kiểu dáng, màu sắc, kích cỡ...",
  "Đa dạng về phong cách, kiểu dáng, màu sắc, kích cỡ..."
];
$bg = [
  "https://wallpaper.dog/large/10796489.jpg",
  "https://wallpaperaccess.com/full/2067364.jpg"
];
$categoryURL = [
  "/watch?brand%5B0%5D=rolex",
  "/watch?brand%5B0%5D=apple"
];
?>
<div class="row category-fragment">
  <?php
  $i = 0;
  for ($i = 0; $i < count($title); $i++) {
    $title_item_category = $title[$i];
    $content_item_category = $content[$i];
    $bg_item_category = $bg[$i];
    $url_item_category = $categoryURL[$i];
    require 'itemCategory.php';
  }
  ?>
</div>