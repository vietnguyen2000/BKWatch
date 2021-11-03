<ul class="rating" title="<?= number_format((float)$product['rate'], 1, '.', '') ?> stars">
  <?php
  $__productRate = round((float)$product['rate']);
  for ($i = 0; $i < $__productRate; $i++) { ?>
    <li>
      <i class="fas fa-star fa-sm text-primary"></i>
    </li>
  <?php }
  for ($i = 5; $i > $__productRate; $i--) {
  ?>
    <li>
      <i class="far fa-star fa-sm text-primary"></i>
    </li>
  <?php } ?>
</ul>