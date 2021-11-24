<?php
if (!function_exists('currency_format')) {
  function currency_format($number, $suffix = 'đ')
  {
    if (!empty($number)) {
      return number_format($number, 0, ',', '.') . "{$suffix}";
    }
  }
}
?>
<!-- <div class="col-6 col-md-4 col-lg-3 col-xl-2 my-2"> -->
<li class="list-group-item">
  <div class="float-start">
    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
      <img src="<?= $product['imageURLs'][0]?>" class="img-fluid" style="object-fit: contain; aspect-ratio: 7/8; height:150px;" alt="preview item #<?= $product['id'] ?>" />
      <a href="watch/<?= $product['id'] ?>">
        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
      </a>
    </div>
  </div>
  
  <div class="float-end">
    <p class="text-primary"><?= currency_format($product['price']) ?></p>
    <button class="btn btn-primary" onclick="addToCart(<?= $product['id'] ?>, '<?= $product['title'] ?>')">Thêm vào giỏ</button>
  </div>
  <h6 class="" style="min-height: 60px;"><a href="watch/<?= $product['id'] ?>"><?= $product['title'] ?></a></h6>  
  <div class="clearfix"></div>
</li>
  <!-- </div> -->