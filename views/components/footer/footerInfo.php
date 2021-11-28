<h5 class="title-footer">THÔNG TIN LIÊN HỆ</h5>
<div class="row text-white">
  <div class="col-12">
    <div class="d-flex flex-row">
      <div class="p-2">
        <i class="fas fa-map-marker-alt fa-lg text-primary" style="width:20px;"></i>
      </div>
      <div class="p-2">
        <?php
        foreach ($addressData as $value) {
        ?>
          <div><?php print_r($value); ?></div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="d-flex flex-row">
      <div class="p-2">
        <i class="fas fa-phone fa-lg text-primary" style="width:20px;"></i>
      </div>
      <div class="p-2">
        <?php
        foreach ($phoneData as $value) {
        ?>
          <div>(+84) <?php print_r($value); ?></div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="d-flex flex-row">
      <div class="p-2">
        <i class="fas fa-envelope fa-lg text-primary" style="width:20px;"></i>
      </div>
      <div class="p-2">
        <?php
        foreach ($emailData as $value) {
        ?>
          <div><?php print_r($value); ?></div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>